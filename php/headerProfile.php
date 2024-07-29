<?php

// Obtener el nombre de usuario y definir la hora

$id = htmlspecialchars($_SESSION['Id_usuario']);
$username = htmlspecialchars($_SESSION['Nombre_de_Usuario']);
$email = htmlspecialchars($_SESSION['Correo']);
$contraseña = htmlspecialchars($_SESSION['Contraseña']);

include("conexion_bd.php");

$conexion = new conexion();
$sql = "SELECT correo, Nombre_de_Usuario, Contraseña, Nombre, Apellido, Descripcion FROM cuentas c
INNER JOIN perfiles p 
ON c.ID_Cuenta = p.ID_Cuenta
WHERE c.ID_Cuenta = $id";

$stmt = $conexion->consultar($sql, ['id' => $id]);

// Verifica si el resultado tiene datos
if (!empty($stmt)) {
    $result = $stmt[0];

    // Verificación de que los índices existen en el array
    $descripcion = isset($result['Descripcion']) ? htmlspecialchars($result['Descripcion']) : 'No disponible';
    $nombre = isset($result['Nombre']) ? htmlspecialchars($result['Nombre']) : 'No disponible';
} else {
    $descripcion = '';
    $nombre = '';
    $sql = "INSERT INTO perfiles (Id_cuenta, Nombre, Apellido, Descripcion) VALUES ($id,'', '', '')";
    $resultInsert = $conexion->modificar($sql);
}

if (!empty($_POST['btnUpdate'])) {
    if (!empty($_POST['alias']) || !empty($_POST['password']) || !empty($_POST['name']) || !empty($_POST['description'])) {
        $newAlias = htmlspecialchars($_POST['alias']);
        $newPassword = htmlspecialchars($_POST['password']);
        $newName = htmlspecialchars($_POST['name']);
        $newDescription = htmlspecialchars($_POST['description']);

        $sql = 'SELECT Nombre_de_Usuario FROM cuentas';
        $result = $conexion->consultar($sql);
        $userInUse = false;

        foreach ($result as $fila) {
            if ($fila['Nombre_de_Usuario'] == $newAlias) {
                echo '<script>alert("Usuario en uso, pruebe con otro")</script>';
                $userInUse = true;
                break; // Salir del bucle si se encuentra el alias en uso
            }
        }

        if (!$userInUse) {
            $_SESSION['Nombre_de_Usuario'] = $newAlias;
            $_SESSION['Contraseña'] = $newPassword;
            $nombre = $newName;
            $descripcion = $newDescription;

            $sql = "UPDATE perfiles p
            INNER JOIN cuentas c ON p.ID_Cuenta = c.ID_Cuenta
            SET p.Nombre = '$newName', p.Descripcion = '$newDescription', c.Nombre_de_Usuario = '$newAlias', c.Contraseña = '$newPassword'
            WHERE c.Correo = '$email'";
            $resultUpdate = $conexion->modificar($sql);
            if ($resultUpdate) {

                echo '<script>
                alert("Datos actualizados con éxito");
                window.location.href = "' . htmlspecialchars($_SERVER['PHP_SELF']) . '";
                </script>';
            } else {
                echo '<script>alert("Error al actualizar los datos")</script>';
            }
        }
    } else {
        echo '<script>alert("No se pueden enviar datos vacíos")</script>';
    }
}

if (!empty($_POST['btnDelete'])) {

    $sql = "DELETE FROM cuentas WHERE ID_Cuenta = $id";
    $resultado = $conexion->modificar($sql);
    $sql = "ALTER TABLE Perfiles
    ADD CONSTRAINT fk_cuenta_perfil
    FOREIGN KEY (Id_cuenta) REFERENCES Cuentas(ID_Cuenta)
    ON DELETE CASCADE";
    $resultado = $conexion->modificar($sql);
    header("location:../html/login.php");
    session_destroy();
}

?>

<!-- <style>
    .menu {
        display: flex;
        padding: 10px;
        flex-direction: column;
        position: fixed;
        top: 0;
        right: -600px;
        /* Initially hide the menu off-screen */
        width: min(300px, 100%);
        height: 100%;
        background-color: #e4dfa9;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        transition: right 0.5s ease;
        z-index: 1001;
        scrollbar-width: none;
    }

    .menu.active {
        right: 0;
        /* Slide the menu into view */
    }

    .menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* padding: 20px; */
        color: black;
        margin-bottom: 10px;
        margin-top: 10px;
        font-size: 1.8em;
    }

    .menu-header .close-btn {
        cursor: pointer;
    }

    .menu__content {
        margin-top: 15px;
        width: 100%;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black */
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 1000;
        pointer-events: none;
        /* Allows clicking through the overlay when it's not active */
    }

    .overlay.active {
        opacity: 1;
        pointer-events: auto;
        /* Disables clicking through the overlay when it's active */
    }

    .menu__content__inputs {
        background-color: #d8d39f;
        margin-bottom: 5px;
        padding: 5px 5px 0 5px;
        border-radius: 15px;
    }

    .info__user span,
    .menu__item__label {
        display: block;
        font-family: 'OMEGLE', sans-serif;
        font-weight: 100;
    }


    .info__username {
        font-size: 2em;
        color: #da750f;
        margin-left: 10px;

    }

    .info__email {
        font-size: 1.2em;
        margin-left: 10px;

    }

    .menu__item__label {
        width: 100%;
        font-size: 1.3em;
        color: #164738;
    }

    .menu__item__input {
        width: 100%;
        margin: 0 0 4px 0;
        border: none;
        padding: 4px;
        border-radius: 10px;
    }

    .menu__content__btns {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        margin-top: 5px;
    }

    .menu__content__btns input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        color: aliceblue;
        font-family: 'OMEGLE';
        font-weight: 100;
        font-size: 1.3em;
    }

    .btn__delete {
        background-color: #d88634;
        cursor: pointer;

    }

    .btn__update {
        background-color: #789477;
        cursor: pointer;

    }

    .menu__content__img {
        width: 90%;
        position: absolute;
        /* margin-top: -20px; */
        left: 15px;
    }

    .menu__content__img a:link,
    .menu__content__img a:visited {
        color: #1f1d1d;
    }

    .icon__closeSesion {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 1.5em;
    }


    .menu__content__img img {
        width: 100%;
        height: auto;
    }
</style> -->

<style>
    .menu {
    height: 100%;
    display: flex !important;
    padding: 10px !important;
    flex-direction: column !important;
    position: fixed !important;
    top: 0 !important;
    right: -600px !important;
    /* Initially hide the menu off-screen */
    width: min(300px, 100%) !important;
    height: 100% !important;
    background-color: #e4dfa9 !important;
    box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1) !important;
    transition: right 0.5s ease !important;
    z-index: 1001 !important;
    scrollbar-width: none !important;
    overflow: scroll;
}

.menu.active {
    right: 0 !important;
    /* Slide the menu into view */
}

.menu-header {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    /* padding: 20px; */
    color: black !important;
    margin-bottom: 10px !important;
    margin-top: 10px !important;
    font-size: 1.8em !important;
}

.menu-header .close-btn {
    cursor: pointer !important;
}

.menu__content {
    margin-top: 15px !important;
    width: 100% !important;
}

.overlay {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background-color: rgba(0, 0, 0, 0.5) !important;
    /* Semi-transparent black */
    opacity: 0 !important;
    transition: opacity 0.5s ease !important;
    z-index: 1000 !important;
    pointer-events: none !important;
    /* Allows clicking through the overlay when it's not active */
}

.overlay.active {
    opacity: 1 !important;
    pointer-events: auto !important;
    /* Disables clicking through the overlay when it's active */
}

.menu__content__inputs {
    background-color: #d8d39f !important;
    margin-bottom: 5px !important;
    padding: 5px 5px 0 5px !important;
    border-radius: 15px !important;
}

.info__user span,
.menu__item__label {
    display: block !important;
    font-family: 'OMEGLE', sans-serif !important;
    font-weight: 100 !important;
}

.info__username {
    font-size: 2em !important;
    color: #da750f !important;
    margin-left: 10px !important;
}

.info__email {
    font-size: 1.2em !important;
    margin-left: 10px !important;
}

.menu__item__label {
    width: 100% !important;
    font-size: 1.3em !important;
    color: #164738 !important;
}

.menu__item__input {
    width: 100% !important;
    margin: 0 0 4px 0 !important;
    border: none !important;
    padding: 4px !important;
    border-radius: 10px !important;
}

.menu__content__btns {
    width: 100% !important;
    display: flex !important;
    justify-content: space-evenly !important;
    margin-top: 5px !important;
}

.menu__content__btns .btn__submit {
    padding: 10px 20px !important;
    border: none !important;
    border-radius: 25px !important;
    color: aliceblue !important;
    font-family: 'OMEGLE' !important;
    font-weight: 100 !important;
    font-size: 1.3em !important;
}

.btn__delete {
    background-color: #d88634 !important;
    cursor: pointer !important;
}

.btn__update {
    background-color: #789477 !important;
    cursor: pointer !important;
}

.menu__content__img {
    width: 90% !important;
    position: absolute !important;
    /* margin-top: -20px; */
    left: 15px !important;
}

.menu__content__img .icon__closeSesion:link,
.menu__content__img .icon__closeSesion:visited {
    color: #1f1d1d !important;
}

.icon__closeSesion {
    position: absolute !important;
    top: 10px !important;
    left: 10px !important;
    font-size: 1.5em !important;
}

.menu__content__img .img__profile {
    width: 100% !important;
    height: auto !important;
}

</style>
<header class="header">
    <nav class="header__nav">
        <div class="nav__image__logo">
            <img src="./../image/green__eyu__logo.png" alt="">
        </div>
        <!-- <form class="nav__form " action="">
            <input type="text" placeholder="Search...">
            <div class="nav__form__button">
                <input type="submit" value="">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </form> -->
        <button class="header__nav__profile">
            <i class="gg-profile"></i>
        </button>
    </nav>
</header>



<div class="overlay" id="overlay"></div>

<div class="menu" id="menu">
    <div class="menu-header">
        <span class="close-btn" id="close-btn"><i class="fa-solid fa-xmark"></i></span>
        <!-- <span class="close-btn" id="close-btn">&times;</span> -->
        <i class="gg-profile"></i>
    </div>
    <div class="info__user">
        <span class="info__username"><?php echo $username; ?></span>
        <span class="info__email"><?php echo $email; ?></span>
    </div>

    <form id="profile-form" class="menu__content" method="post" action="./home.php">
        <div class="menu__content__inputs">
            <label class="menu__item__label" for="alias">Alias</label>
            <input id="alias" class="menu__item__input" type="text" placeholder="Bokidelgado" name="alias" value="<?php echo $username; ?>">
        </div>
        <div class="menu__content__inputs">
            <label class="menu__item__label" for="password">Contraseña</label>
            <input id="password" class="menu__item__input" type="password" placeholder="Bokidelgado" name="password" value="<?php echo $contraseña; ?>">
        </div>
        <div class="menu__content__inputs">
            <label class="menu__item__label" for="name">Nombre</label>
            <input id="name" class="menu__item__input" type="text" placeholder="Bokidelgado" name="name" value="<?php echo $nombre; ?>">
        </div>
        <div class="menu__content__inputs">
            <label class="menu__item__label" for="description">Descripción</label>
            <textarea id="description" style="resize: none; scrollbar-width: thin;" class="menu__item__input" name="description" cols="30" rows="3"><?php echo $descripcion; ?> </textarea>
        </div>
        <div class="menu__content__btns">
            <input class="btn__update btn__submit" type="submit" value="Actualizar" name="btnUpdate">
            <input class="btn__delete btn__submit" type="submit" value="Eliminar" name="btnDelete">
            <!-- <button type="button" id="updateProfile" class="btn__update" name="btnUpdate">Actualizar</button>
            <button type="button" id="deleteAccount" class="btn__delete" name="btnDelete">Eliminar</button> -->
        </div>
        <div class="menu__content__img">
            <a class="icon__closeSesion" href="./../php/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            <img class="img__profile" src="./../image/IMGPROFILE (1).png" alt="">
        </div>
    </form>

</div>

<!-- <script src="./../JavaScript/menuDesplegable.js"></script> -->
<script>
    const profileButton = document.querySelector('.header__nav__profile');
    const menu = document.getElementById('menu');
    const overlay = document.getElementById('overlay');
    const closeBtn = document.getElementById('close-btn');

    profileButton.addEventListener('click', function() {
        menu.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    closeBtn.addEventListener('click', function() {
        menu.classList.remove('active');
        overlay.classList.remove('active');
    });

    overlay.addEventListener('click', function() {
        menu.classList.remove('active');
        overlay.classList.remove('active');
    });
</script>