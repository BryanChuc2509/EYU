<?php
session_start();

include("./../php/headerProfile.php");
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
    <link rel="stylesheet" href="./../CSS/save.css">


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
                    <li><a href="./../HTML/save.php"><i class="fa-solid fa-bookmark"></i></a></li>
                    <li><a href="./../HTML/test.php"><i class="fa-solid fa-paperclip"></i></a></li>
                    <li><a href="./../HTML/faq.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                    <!-- <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></i></a></li> -->
                </ul>
            </nav>
        </aside>

        <main class="main">
            <div class="main__firstPart">
                <h1>Tus favoritos</h1>
                <div id="container1" class="container-md">
                    <div class="container-md__container__imgUniversity">
                        <img src="./../image/utcancun.png" alt="Logo de Universidad Técnologica de Cancún">
                        <button class="delete" onmouseover="darkenImage('container1')" onmouseout="undarkenImage('container1')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    <div class="container-md__container__infoUniversity">
                        <h2>Universidad Técnologica de Cancún</h2>
                        <p class="ellipsis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio reiciendis
                            animi eveniet sunt
                            commodi illum eius fugit quaerat veniam distinctio dolores aliquam sed, eos ad beatae.
                            Fugit,
                            libero reprehenderit!</p>
                    </div>
                </div>
                <div id="container2" class="container-md">
                    <div class="container-md__container__imgUniversity">
                        <img src="./../image/utcancun.png" alt="Logo de Universidad Técnologica de Cancún">
                        <button onmouseover="darkenImage('container2')" onmouseout="undarkenImage('container2')" class="delete"><i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    <div class="container-md__container__infoUniversity">
                        <h2>Universidad Técnologica de Cancún</h2>
                        <p class="ellipsis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio reiciendis
                            animi eveniet sunt
                            commodi illum eius fugit quaerat veniam distinctio dolores aliquam sed, eos ad beatae.
                            Fugit,
                            libero reprehenderit!</p>
                    </div>
                </div>
                <div id="container2" class="container-md">
                    <div class="container-md__container__imgUniversity">
                        <img src="./../image/utcancun.png" alt="Logo de Universidad Técnologica de Cancún">
                        <button onmouseover="darkenImage('container2')" onmouseout="undarkenImage('container2')" class="delete"><i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    <div class="container-md__container__infoUniversity">
                        <h2>Universidad Técnologica de Cancún</h2>
                        <p class="ellipsis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio reiciendis
                            animi eveniet sunt
                            commodi illum eius fugit quaerat veniam distinctio dolores aliquam sed, eos ad beatae.
                            Fugit,
                            libero reprehenderit!</p>
                    </div>
                </div>
                <div id="container2" class="container-md">
                    <div class="container-md__container__imgUniversity">
                        <img src="./../image/utcancun.png" alt="Logo de Universidad Técnologica de Cancún">
                        <button onmouseover="darkenImage('container2')" onmouseout="undarkenImage('container2')" class="delete"><i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    <div class="container-md__container__infoUniversity">
                        <h2>Universidad Técnologica de Cancún</h2>
                        <p class="ellipsis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio reiciendis
                            animi eveniet sunt
                            commodi illum eius fugit quaerat veniam distinctio dolores aliquam sed, eos ad beatae.
                            Fugit,
                            libero reprehenderit!</p>
                    </div>
                </div>
            </div>
            <div class="main__secondPart__imgFox">
                <img class="fox" src="./../image/pixelcut-export.png" class="rounded float-start" alt="...">
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
        function darkenImage(containerId) {
            var image = document.getElementById(containerId);
            image.style.filter = 'brightness(70%)';
            image.style.filter = 'brightness(70%)';
        }

        function undarkenImage(containerId) {
            var image = document.getElementById(containerId);
            image.style.filter = 'brightness(100%)';
        }
    </script>

</body>

</html>