<?php
session_start();

include("./../php/headerProfile.php");

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
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
            /* display: flex;
    flex-direction: column; */
            scrollbar-width: none;
        }

        .header__nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            /* background-color: #e6e2dd; */
        }

        /* logo */
        .nav__image__logo {
            width: 115px;
            margin-left: 20px;
        }

        .nav__image__logo img {
            width: 100%;
            height: auto;
        }

        /* logo end */

        .nav__form {
            width: 40%;
            display: flex;
        }

        .nav__form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 25px;
            border: 2px solid #da750f;
        }

        /* div input-submit__bar */
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

            .gg-profile {
                color: #e6e2dd;
            }
        }





        /* main */

        .main {
            display: flex;
            flex-wrap: wrap;
            width: 95%;
        }

        .main__wrapper {
            display: flex;
            /* background-color: aqua; */
        }

        .aside__nav__secondary {
            display: flex;
            justify-content: center;
            align-items: start;
            width: min(100px, 100%);
            /* height: 70vh; */
            /* margin-right: 30px; */
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

        /* profile */

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



        /* main*/

        /* main */

        /* footer */

        footer {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            text-align: center;
            /* position: fixed; */
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
    </style>
</head>

<body>

    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./../HTML/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./../HTML/catalogue.php"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <li><a href="./../HTML/ranking.php"><i class="fa-solid fa-trophy"></i></a></li>
                    <!-- <li><a href="./../HTML/save.php"><i class="fa-solid fa-bookmark"></i></a></li> -->
                    <li><a href="./../HTML/test.php"><i class="fa-solid fa-paperclip"></i></a></li>
                    <li><a href="./../HTML/faq.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                    <!-- <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></i></a></li> -->
                </ul>
            </nav>
        </aside>

        <style>
            .main {
                width: 90%;
            }

            .main__firstPart {
                width: 100%;
                padding: 20px;
                border-radius: 25px;
                background-color: #d8d39f;
                min-height: 50px;
            }

            h2,
            .opiniones__header,
            .comentarios__header,
            h1 {
                font-family: 'OMEGLE', sans-serif;
                font-weight: 100;
                font-size: 2em;
                color: #164738;
            }

            .career__details {
                margin-bottom: 10px;
            }

            .career__duration {
                font-weight: 900;
            }

            strong {
                font-weight: 900;
            }

            .main__secondPart {
                padding: 20px;
            }

            .contenedor {
                display: flex;
                flex-direction: row;
                gap: 40px;
            }

            .contenedor__imgUni {
                /* width: 30%; */
                width: 600px;
            }

            .contenedor__imgUni img {
                width: 100%;
                height: auto;
                border-radius: 20px;
            }

            .contenedor__text {
                width: 70%;
                background-color: #d8d39f;
                border-radius: 18px;
                padding: 10px;

            }

            .opiniones {
                display: flex;
                flex-direction: row;
                width: 100%;
                gap: 5px;
            }

            .opiniones__section {
                width: 30%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 10px;
                padding: 10px 0;
            }

            .contenedor__imgUni {
                width: 300px
            }

            .contenedor__imgFox {
                width: 250px;
            }

            .contenedor__imgUni img,
            .contenedor__imgFox img {
                width: 100%;
                height: auto;
            }

            .comentarios {
                width: 70%;
                background-color: #d8d39f;
                padding: 15px;
                border-radius: 18px;
                margin-bottom: 30px;
            }

            .comentarios__item {
                background-color: #e4dfa9;
                border-radius: 18px;
                padding: 10px;
                margin-bottom: 10px;
            }

            .comentarios__header {
                text-align: center;
            }

            .input__comment {
                border: none;
                background-color: #789477;
                color: #1f1d1d;
                border-radius: 15px;
            }

            textarea {
                border: 1px solid grey;
            }
        </style>

        <?php
        if (!empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $conexion = new conexion();

            $sql = "SELECT 
                u.Nombre, u.Descripcion, u.Tipo_de_Universidad, u.URL_pagina, u.Correo_contacto, u.image, 
                d.calle, d.Supermanzana, d.Manzana, d.Lote, d.CP, 
                crr.Nombre AS carreraNombre, crr.Duracion AS carreraDuracion, crr.Descripcion AS carreraDescripcion 
            FROM universidades u 
            INNER JOIN direccion d ON u.ID_Direccion = d.ID_Direccion
            INNER JOIN universidad_carrera uc ON u.Id_universidad = uc.Id_universidad
            INNER JOIN carreras crr ON crr.ID_Carrera = uc.ID_carrera
            WHERE u.Id_universidad = ?";

            // Preparar y ejecutar la consulta
            $sentencia = $conexion->conexion->prepare($sql);
            $sentencia->execute([$id]);
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($resultado)) {
                $universidad = $resultado[0]; // Obtener datos de la universidad
                $carreras = []; // Inicializa el array de carreras
                foreach ($resultado as $fila) {
                    $carreras[] = [
                        'nombre' => $fila['carreraNombre'],
                        'duracion' => $fila['carreraDuracion'],
                        'descripcion' => $fila['carreraDescripcion']
                    ];
                }
            }

            // Manejo del formulario de comentarios
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comentario'])) {
                $contenido = htmlspecialchars($_POST['comentario']);

                $idUsuario = htmlspecialchars($_SESSION['Id_usuario']);


                $sqlInsertarComentario = "INSERT INTO comentarios (Contenido, Id_cuenta, Id_universidad) VALUES (?, ?, ?)";
                $sentenciaInsertar = $conexion->conexion->prepare($sqlInsertarComentario);
                $sentenciaInsertar->execute([$contenido, $idUsuario, $id]);
            }


            // Consulta para obtener los comentarios
            $sqlComentarios = "SELECT cts.Nombre_de_Usuario, cmts.Contenido 
                       FROM cuentas cts
                       INNER JOIN comentarios cmts ON cmts.Id_cuenta = cts.ID_Cuenta
                       WHERE cmts.Id_universidad = ?";
            $sentenciaComentarios = $conexion->conexion->prepare($sqlComentarios);
            $sentenciaComentarios->execute([$id]);
            $comentarios = $sentenciaComentarios->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <main class="main">
            <div class="main__firstPart">
                <h2>Carreras</h2>
                <?php if (!empty($carreras)) : ?>
                    <?php foreach ($carreras as $carrera) : ?>
                        <details class="career__details">
                            <summary class="career__summary"><?= htmlspecialchars($carrera['nombre']) ?></summary>
                            <div class="career__info">
                                <span class="career__duration">Duración: <?= htmlspecialchars($carrera['duracion']) ?></span>
                                <p class="career__description">
                                    <strong>Descripción:</strong> <?= htmlspecialchars($carrera['descripcion']) ?>
                                </p>
                            </div>
                        </details>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="main__secondPart">
                <?php if (!empty($universidad)) : ?>
                    <h1 class="university__name"><?= htmlspecialchars($universidad['Nombre']) ?></h1>
                    <div class="contenedor">
                        <div style="text-align: center;" class="contenedor__imgUni">
                            <img src="<?= htmlspecialchars($universidad['image']) ?>" alt="Imagen de la universidad" class="img-fluid">
                            <a href="<?= htmlspecialchars($universidad['URL_pagina']) ?>"><?= htmlspecialchars($universidad['URL_pagina']) ?></a>
                        </div>
                        <div class="contenedor__text">
                            <p class="university__address">Ubicada en la <?= htmlspecialchars($universidad['calle']) ?>, SMZA <?= htmlspecialchars($universidad['Supermanzana']) ?>, MZA <?= htmlspecialchars($universidad['Manzana']) ?>, Lote <?= htmlspecialchars($universidad['Lote']) ?>, CP <?= htmlspecialchars($universidad['CP']) ?></p>
                            <p class="university__description"><?= htmlspecialchars($universidad['Descripcion']) ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <p>Información de la universidad no encontrada.</p>
                <?php endif; ?>
            </div>


            <div class="opiniones">
                <div class="opiniones__section">
                    <div class="opiniones__header">Opiniones</div>
                    <div class="contenedor__imgUni">
                        <img src="<?= htmlspecialchars($universidad['image']) ?>" alt="Imagen de la universidad" class="img-fluid">
                    </div>
                    <form style="display: flex; flex-direction: column; gap: 10px;" action="" method="post">
                        <textarea name="comentario" id="comentario" cols="30" rows="6"></textarea>
                        <input class="input__comment" type="submit" value="Comentar">
                    </form>
                    <div class="contenedor__imgFox">
                        <img src="./../image/FOX ranking.JPG" alt="Imagen de usuario" class="opiniones__user-img" class="img-fluid">
                    </div>
                </div>
                <div class="comentarios">
                    <div class="comentarios__header">Comentarios</div>
                    <?php if (!empty($comentarios)) : ?>
                        <?php foreach ($comentarios as $comentario) : ?>
                            <div class="comentarios__item">
                                <div class="d-flex align-items-start gap-3">
                                    <i class="gg-profile"></i>
                                    <span class="comentarios__username"><?= htmlspecialchars($comentario['Nombre_de_Usuario']) ?>:</span>
                                </div>
                                <p class="comentarios__text"><?= htmlspecialchars($comentario['Contenido']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No hay comentarios.</p>
                    <?php endif; ?>
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



</body>

</html>