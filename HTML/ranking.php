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
    <title>Home</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./../CSS/ranking.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<body>

    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./../HTML/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./../HTML/catalogue.php"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <!-- <li><a href="./../HTML/ranking.php"><i class="fa-solid fa-trophy"></i></a></li> -->
                    <li><a href="./../HTML/save.php"><i class="fa-solid fa-bookmark"></i></a></li>
                    <li><a href="./../HTML/test.php"><i class="fa-solid fa-paperclip"></i></a></li>
                    <li><a href="./../HTML/faq.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                    <!-- <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></i></a></li> -->
                </ul>
            </nav>
        </aside>
        <main class="main">
            <div class="main__infoSuperior">
                <h1>Hecha un vistazo a lo mejor de lo mejor</h1>
                <p class="main__infoSuperior__p">El siguiente Ranking se basa en las calificaciones brindadas por los
                    estudiantes. No buscamos
                    desvalorizar a ninguna institución, simplemente buscamos la interacción de nuestros usuarios para
                    evaluar la diversidad y calidad de las universidades locales </p>
                <div class="main__infoSuperior__fox">
                    <img src="./../image/Fox ranking.JPG" alt="">
                </div>
            </div>
            <div class="contenedor contenedor--1">
                <span class="number number--1">1°</span>
                <div class="info__middle">
                    <h2>Universidad tecnológica de Cancún</h2>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex eveniet, dolorum
                        ut ipsum consectetur
                        qui perferendis facere at, nostrum necessitatibus iure. Laborum dolorum labore, aliquam optio
                        sunt
                        cupiditate voluptas deleniti.</p>
                    <a class="comment" href="./profileUni.php?id=1">Comentarios</a>
                </div>
                <div class="img__uni">
                    <img src="./../image/anahuac.png" alt="">
                </div>
            </div>
            <div class="contenedor">
                <span class="number ">2°</span>
                <div class="info__middle">
                    <h2>Universidad tecnológica de Cancún</h2>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex eveniet, dolorum
                        ut ipsum consectetur
                        qui perferendis facere at, nostrum necessitatibus iure. Laborum dolorum labore, aliquam optio
                        sunt
                        cupiditate voluptas deleniti.</p>
                    <a class="comment" href="">Comentarios</a>
                </div>
                <div class="img__uni">
                    <img src="./../image/anahuac.png" alt="">
                </div>
            </div>
            <div class="contenedor">
                <span class="number">3°</span>
                <div class="info__middle">
                    <h2>Universidad tecnológica de Cancún</h2>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex eveniet, dolorum
                        ut ipsum consectetur
                        qui perferendis facere at, nostrum necessitatibus iure. Laborum dolorum labore, aliquam optio
                        sunt
                        cupiditate voluptas deleniti.</p>
                    <a class="comment" href="">Comentarios</a>
                </div>
                <div class="img__uni">
                    <img src="./../image/anahuac.png" alt="">
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