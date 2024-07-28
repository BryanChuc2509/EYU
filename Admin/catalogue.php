<?php 
    session_start();
    
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
    <link rel="stylesheet" href="./../CSS/catalogueAdmin.css">
</head>
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
                <h1>Universidades </h1>
                <a href="./addUniversity copy.php">Agregar</a>
                <div id="container1" class="container-md">
                    <div class="container-md__container__imgUniversity">
                        <img src="./../image/utcancun.png" alt="Logo de Universidad Técnologica de Cancún">
                    </div>
                    <div class="container-md__container__infoUniversity">
                        <h2>Universidad Técnologica de Cancún</h2>
                        <p class="ellipsis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio reiciendis
                            animi eveniet sunt
                            commodi illum eius fugit quaerat veniam distinctio dolores aliquam sed, eos ad beatae.
                            Fugit,
                            libero reprehenderit!</p>
                    </div>
                    <div class="btns-updateDelete">
                        <a class="btn-delete" href="">Eliminar</a>
                        <a class="btn-update" href="">Actualizar</a>
                    </div>
                </div>
            </div>
            <div class="main__secondPart__AddUniversity">
                <button class="btn-add">
                    <i class="fa-solid fa-file-pen"></i>
                    <br>
                    Agregar
                    <br>
                    universidades</button>
                <!-- <img class="fox" src="/image/pixelcut-export.png" class="rounded float-start" alt="..."> -->
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