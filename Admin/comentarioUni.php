<?php
session_start();

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}

if ($_SESSION['privilegio'] != 'administrador') {
    header('Location: ./../HTML/home.php');
    exit();
}

include("./../php/headerProfile.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
</head>

<style>
    /* Your CSS styles */
    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        font-family: sans-serif;
        min-height: 100vh;
    }

    .header__nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }

    .nav__image__logo {
        width: 115px;
        margin-left: 20px;
    }

    .nav__image__logo img {
        width: 100%;
        height: auto;
    }

    .nav__form {
        width: 40%;
        display: flex;
    }

    .nav__form input[type="text"] {
        width: 100%;
        padding: 6px;
        border: none;
        border-radius: 25px;
        border: 2px solid #da750f;
    }

    .nav__form__button {
        display: flex;
        position: relative;
        min-width: 15%;
        height: auto;
    }

    .nav__form__button input[type="submit"] {
        width: 100%;
        margin-left: 5px;
        height: auto;
        border: none;
        border-radius: 25px;
        border: none;
        background-color: #e4dfa9;
        transition: background-color 0.8s, box-shadow 0.5s;
    }

    .nav__form__button input[type="submit"]:hover {
        box-shadow: 0 0 5px black;
        background-color: #da750f;
    }

    .fa-magnifying-glass {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .header__nav__profile {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 20px;
        background-color: #e4dfa9;
        border-radius: 25px;
        width: 70px;
        height: 40px;
        color: #164738;
        transition: background-color 0.8s, box-shadow 0.5s;
        position: relative;
        border: none;
        cursor: pointer;
    }

    .header__nav__profile:hover {
        background-color: #164738;
        box-shadow: 0 0 15px black;
    }

    .main__wrapper {
        display: flex;
    }

    .aside__nav__secondary {
        display: flex;
        justify-content: center;
        align-items: start;
        width: min(100px, 100%);
    }

    .secondary__bar__nav ul {
        list-style: none;
        text-align: center;
        padding: 20px;
        border: none;
    }

    .secondary__bar__nav li a {
        font-size: 1.8rem;
        color: #1f1d1d;
        transition: color 0.3s;
    }

    .secondary__bar__nav li a:hover {
        color: #da750f;
    }

    .secondary__bar__nav li {
        margin-bottom: 15px;
    }

    /* profile styles*/
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

    /* Profile styles end*/


    .main {
        display: flex;
        flex-wrap: wrap;
        width: 95%;
        gap: 20px;
    }

    /* Comentarios */

    h1 {
        font-family: "OMEGLE", sans-serif;
        color: #164738;
        font-weight: 100;
        margin-top: 20px;

    }

    .container-md {
        background-color: #e4dfa9;
        border-radius: 25px;
        width: 100%;
        max-width: 800px;
        padding: 20px 20px 5px 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: filter 1s;
    }


    .main__firstPart h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .container-md {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .user {
        display: flex;
        align-items: center;
        color: #164738;
        width: 100%;
        gap: 20px;
    }

    /* .user i {
        margin-left: 10px;
    } */

    .container__user {
        display: flex;
        width: 100%;
        gap: 20px;
    }

    button {
        background-color: transparent;
        border: none;
    }

    .delete {
        padding: 10px;
        background-color: #164738;
        border-radius: 50%;
    }

    .fa-trash {
        font-size: 1.4rem;
        color: #fff;
    }

    .comment {
        padding: 10px 0;
    }




    .main__secondPart__img {
        width: 300px;
        height: 250px;
        margin-top: 70px;
        display: flex;
        justify-content: center;
    }

    .main__secondPart__img img {
        width: 100%;
        height: auto;
    }

    footer {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        text-align: center;
        margin-top: 20px;
        bottom: 0;
        background-color: #164738;
        width: 100%;
        color: #e6e2dd;
        padding: 5px;
    }

    footer a {
        color: #e6e2dd;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }

    footer img {
        width: 150px;
    }

    @media (width < 1230px) {
        .nav__image__logo {
            display: none;
        }

        .nav__form {
            width: 70%;
        }

        .aside__nav__secondary {
            width: 100%;
            background-color: #164738;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .secondary__bar__nav ul {
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 50px;
        }

        .secondary__bar__nav ul li {
            padding: 0 10px 0 10px;
            color: #e6e2dd;
        }

        .secondary__bar__nav ul li a {
            color: #e6e2dd;
        }

        .main__wrapper {
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .main {
            flex-direction: column;
            align-items: center;
            min-height: 100dvh;
        }


        .main__secondPart__img {
            margin-top: 0;
        }
    }

    @media (width < 750px) {
        .container-md {
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container-md__container__imgUniversity {
            margin-right: 0;
        }

        .main__secondPart__img {
            width: min(inherit, 100%);
            height: auto;
        }
    }
</style>

<body>


    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./../Admin/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./../Admin/catalogue.php"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <li><a href="./../Admin/comentarios.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                </ul>
            </nav>
        </aside>
        <main class="main">

            <div class="main__firstPart">

                <!-- Contenedor de un comentario -->
                <?php
                if (!empty($_GET['id'])) {
                    $id = htmlspecialchars($_GET['id']);
                    $conexion = new conexion();

                    $sql = "SELECT Nombre FROM universidades WHERE ID_Universidad = $id"; 
                    $resultado = $conexion->consultar($sql); 

                    foreach ($resultado as $fila) {
                        // Verificar y procesar cada elemento del array
                        if (isset($fila["Nombre"])) {
                            $nombreUniversidad = htmlspecialchars($fila["Nombre"]);
                            echo '<h1>' . $nombreUniversidad . '</h1>';
                        }
                    }




                    // Realizar la consulta
                    $sql = "SELECT cts.Nombre_de_Usuario, cmts.Contenido, cmts.ID_Comentarios, uns.Nombre 
            FROM cuentas cts
            INNER JOIN comentarios cmts ON cmts.Id_cuenta = cts.ID_Cuenta
            INNER JOIN universidades uns ON uns.ID_Universidad = cmts.Id_universidad 
            WHERE uns.ID_Universidad = $id";
                    $resultado = $conexion->consultar($sql);

                    if ($resultado) {

                    // Mostrar comentarios en el formato HTML deseado
                    foreach ($resultado as $fila) {
                        $nombreUsuario = htmlspecialchars($fila["Nombre_de_Usuario"]);
                        $contenido = htmlspecialchars($fila["Contenido"]);
                        $idComentario = htmlspecialchars($fila["ID_Comentarios"]);
                        $nombreUniversidad = htmlspecialchars($fila["Nombre"]);

                        echo '<div id="container1" class="container-md">';
                        echo '    <div class="container__user">';
                        echo '        <div class="user">';
                        echo '            <i class="gg-profile"></i>'; // Icono del perfil; puedes cambiarlo si es necesario
                        echo '            <p>' . $nombreUsuario . '</p>';
                        echo '        </div>';
                        echo '        <div class="delete">';
                        echo '            <a href="./../php/deleteComment.php?id=' . $idComentario . '" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este comentario?\')">';
                        echo '                <i class="fa-solid fa-trash"></i>';
                        echo '            </a>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '    <div class="comment">';
                        echo '        <p>' . $contenido . '</p>';
                        echo '    </div>';
                        echo '</div>';
                    }} else {
                        echo '<div id="container1" class="container-md"> ';
                        echo '<h1> Ups! Parece que no hay comentarios</h1>';

                        echo '</div>';
                    }
                }
                ?>





                <script>
                    function redireccionar() {
                        window.location.href = './../php/deleteComment.php?id=<?php echo $id; ?>'; // Cambia esta URL a la deseada
                    }
                </script>

                <!-- termina contenedor de comentario -->


                <div class="main__secondPart__img">
                    <img src="./../image/FOX ranking.JPG" alt="Fox Ranking">
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
</body>

</html>