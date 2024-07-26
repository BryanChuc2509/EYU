<!-- session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../html/login.php"); 
    exit;
}
$username = $_SESSION['username'];
date_default_timezone_set('America/Mexico_City');
$date = date('F d, Y');

?> -->
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/ranking.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<body>
    <header class="header">
        <nav class="header__nav">
            <div class="nav__image__logo">
                <img src="/image/green__eyu__logo.png" alt="">
            </div>
            <form class="nav__form " action="">
                <input type="text" placeholder="Search...">
                <div class="nav__form__button">
                    <input type="submit" value="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </form>
            <button class="header__nav__profile">
                <i class="gg-profile"></i>
            </button>
        </nav>
    </header>
    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./home.html"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./catalogue.html"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <li><a href="./ranking.html"><i class="fa-solid fa-trophy"></i></a></li>
                    <li><a href="./save.html"><i class="fa-solid fa-bookmark"></i></a></li>
                    <li><a href="./test.html"><i class="fa-solid fa-paperclip"></i></a></li>
                    <li><a href="./faq.html"><i class="fa-regular fa-comment-dots"></i></a></li>
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
                    <img src="/image/Fox ranking.JPG" alt="">
                </div>
            </div>
        </main>
    </div>
    <footer class="footer">
        <div class="footer__logo">
            <img src="/image/eyu logo.png" alt="">
        </div>
        <div class="container__sections">
            <a href="">Conocenos</a>
            <a href="">Instagram</a>
            <a href="">Contacto</a>
        </div>
        <p class="footer__p">Benito Juarez. Cancún, Quintana Roo. México ESP/MEX</p>
        <p class="footer__p">Copyright © EYU Explore Your University 2024</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function () {
            $(".rateyo").rateYo({
                starWidth: "20px",
                fullStar: true
            }).on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    </script>
</body>

</html>
