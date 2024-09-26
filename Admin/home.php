<?php
session_start();

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}

// if ($_SESSION['privilegio'] != 'administrador') {
//     header('Location: ./../HTML/home.php');
//     exit();
// }

// Obtener el nombre de usuario y definir la hora

$id = htmlspecialchars($_SESSION['Id_usuario']);
$username = htmlspecialchars($_SESSION['Nombre_de_Usuario']);
$email = htmlspecialchars($_SESSION['Correo']);
$contraseña = htmlspecialchars($_SESSION['Contraseña']);
date_default_timezone_set('America/Cancun');
$now = new DateTime();
$hour = (int)$now->format('H');


// Saludo basado en la hora
if ($hour < 12) {
    $greeting = "Buenos días";
} elseif ($hour < 18) {
    $greeting = "Buenas tardes";
} else {
    $greeting = "Buenas noches";
}

include("./../php/conexion_bd.php");

$conexion = new conexion();
$sql = "SELECT * FROM frase";
$result = $conexion->consultar($sql);
$numRows = count($result);

$numRandom = rand(0, $numRows - 1);
$selectedPhrase = $result[$numRandom]['frase'];

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
                window.location.href = "./../Admin/home.php";
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
    // $sql = "ALTER TABLE Perfiles
    // ADD CONSTRAINT fk_cuenta_perfil
    // FOREIGN KEY (Id_cuenta) REFERENCES Cuentas(ID_Cuenta)
    // ON DELETE CASCADE";
    $resultado = $conexion->modificar($sql);
    header("location:../html/login.php");
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../CSS/home.css">
    <title>Home</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<?php

$conexion = new conexion();

// Consulta SQL
$sql = "SELECT ID_Universidad, Nombre FROM universidades";

// Obtener los resultados
$resultado = $conexion->consultar($sql);
?>

<body>
    <header class="header">
        <nav class="header__nav">
            <div class="nav__image__logo">
                <img src="./../image/green__eyu__logo.png" alt="">
            </div>
            <form class="nav__form" id="search-form" onsubmit="return false;">
            <input class="buscador" type="text" id="search-input" placeholder="Buscar universidad..." autocomplete="off">
            <div class="nav__form__button" style="height: max-content;">
                <input type="submit" value="" style="height: 40px;" >
                <i class="fa-solid fa-magnifying-glass" ></i>
            </div>
            <div id="results-container" class="results-container">
                <?php
                // Generar la lista de universidades
                foreach ($resultado as $fila) {
                    echo '<div class="result-item" data-id="' . htmlspecialchars($fila["ID_Universidad"]) . '">';
                    echo '    <a href="comentarioUni.php?id=' . htmlspecialchars($fila["ID_Universidad"]) . '">';
                    echo '        ' . htmlspecialchars($fila["Nombre"]);
                    echo '    </a>';
                    echo '</div>';
                }
                ?>
                <div class="no-results hidden">No hay resultados</div>
            </div>
        </form>
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
                <input class="btn__update" type="submit" value="Actualizar" name="btnUpdate">
                <input class="btn__delete" type="submit" value="Eliminar" name="btnDelete">
                <!-- <button type="button" id="updateProfile" class="btn__update" name="btnUpdate">Actualizar</button>
            <button type="button" id="deleteAccount" class="btn__delete" name="btnDelete">Eliminar</button> -->
            </div>
            <div class="menu__content__img">
                <a class="icon__closeSesion" href="./../php/logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
                <img src="./../image/IMGPROFILE (1).png" alt="">
            </div>
        </form>

    </div>

    <script src="./../JavaScript/menuDesplegable.js"></script>

    <style>
        .unixd:link, .unixd:visited {
            color: #165e46e8;
        }

        .unixd {
            text-decoration: none;
        }
        .unixd:hover {
            text-decoration: underline;
        }
    </style>


    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./../Admin/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./../Admin/catalogue.php"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <li><a href="./../Admin/comentarios.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                    <!-- <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></i></a></li> -->
                </ul>
            </nav>
        </aside>
        <main class="main">
            <div class="main__firstSection">
                <h1><?php echo $greeting . ' ' . $username; ?></h1>
                <p class="main__firstSection__p" id="current-date">March 18, 2024 🎊</p>
                <div class="mainFirstSection__containerImg">
                    <img src="./../image/main__image__new.png" alt="">
                </div>
            </div>

            <div class="main__secondSection">
                <p class="main__secondSection__p">"<?php echo $selectedPhrase; ?>"</p>
                <h2>Te puede interesar</h2>
                <div class="mainSecondSection__containerUniversity">
                    <div class="img__university">
                        <img src="./../image/utcancun.png" alt="">
                    </div>
                    <h3><a class="unixd" href="./profileUni.php?id=1">Universidad Técnologica...</a> </h3>
                    <p class="main__secondSection__ubication">Ubicada en la AV colosio, mza 35, lt2, CP 77539</p>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <div class="footer__logo">
            <img src="./../image/eyu logo.png" alt="">
        </div>
        <div class="container__sections">
            <a href="">Conocenos</a>
            <a href="">Instagram</a>
            <a href="">Contacto</a>
        </div>
        <p class="footer__p">Benito Juarez. Cancún, Quintana Roo. México ESP/MEX</p>
        <p class="footer__p">Copyright © EYU Explore Your University 2024</p>
    </footer>

    <script>
        // Obtener la fecha actual
        const today = new Date();

        // Array de nombres de meses en español
        const meses = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];

        // Formatear la fecha en "Mes Día, Año"
        const fechaFormateada = `${meses[today.getMonth()]} ${today.getDate()}, ${today.getFullYear()}`;

        // Actualizar el contenido del elemento con la fecha
        document.getElementById('current-date').textContent = `${fechaFormateada} 🎊`;
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
    .results-container {
        display: none;
        /* Ocultar la lista inicialmente */
        position: absolute;
        background: white;
        width: 100%;
        border: 1px solid #ccc;
        max-height: 200px;
        /* overflow-y: auto; */
        z-index: 1000;
        /* overflow: scroll; */
        scrollbar-width:thin;
    }

    .results-container.show {
        display: block;
        /* Mostrar la lista cuando sea necesario */
    }

    .result-item {
        padding: 10px;
        cursor: pointer;
        text-decoration: none;
    }

    .result-item:hover {
        background-color: #f0f0f0;
    }

    .hidden {
        display: none;
    }

    .no-results {
        padding: 10px;
        color: #888;
        text-align: center;
    }
</style>


<script>
    // Función para eliminar acentos y normalizar cadenas
    function normalizeString(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    const searchInput = document.getElementById('search-input');
    const resultsContainer = document.getElementById('results-container');
    const items = document.querySelectorAll('.result-item');
    const noResultsMessage = document.querySelector('.no-results');

    searchInput.addEventListener('keyup', e => {
        const searchTerm = e.target.value.trim();
        const normalizedSearchTerm = normalizeString(searchTerm).toLowerCase();

        let anyMatch = false;
        items.forEach(universidad => {
            const itemText = normalizeString(universidad.textContent).toLowerCase();

            // Verificar si el término de búsqueda está incluido en el texto del elemento
            const matches = normalizedSearchTerm.split(/\s+/).every(term => itemText.includes(term));

            universidad.classList.toggle('hidden', !matches);

            if (matches) {
                anyMatch = true;
            }
        });

        // Mostrar u ocultar el mensaje de "No hay resultados"
        noResultsMessage.classList.toggle('hidden', anyMatch);

        // Mostrar la lista cuando se comienza a escribir y hay coincidencias
        if (searchTerm.length > 0) {
            resultsContainer.classList.add('show');
        } else {
            resultsContainer.classList.remove('show');
        }
    });

    document.getElementById('search-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const searchTerm = normalizeString(document.getElementById('search-input').value.trim()).toLowerCase();
        let closestMatch = null;

        // Encontrar el primer elemento que coincida
        items.forEach(universidad => {
            const itemText = normalizeString(universidad.textContent).toLowerCase();

            if (itemText.includes(searchTerm) && !closestMatch) {
                closestMatch = universidad;
            }
        });

        if (closestMatch) {
            const id = closestMatch.getAttribute('data-id');
            window.location.href = `./../HTML/profileUni.php?id=${id}`;
        } else {
            alert('No hay coincidencias');
        }
    });

    document.addEventListener('click', function(e) {
        if (!document.getElementById('search-form').contains(e.target)) {
            resultsContainer.classList.remove('show');
        }
    });

    searchInput.addEventListener('focus', function() {
        if (searchInput.value.trim().length > 0) {
            resultsContainer.classList.add('show');
        }
    });
</script>

<style>
    .nav__form {
        position: relative;
    }

    .nav__form__button {
        display: inline-block;
    }

    .results-container {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
        display: none;
    }

    .result-item {
        padding: 10px;
        cursor: pointer;
    }

    .result-item:hover {
        background: #f0f0f0;
    }
</style>

</body>

</html>