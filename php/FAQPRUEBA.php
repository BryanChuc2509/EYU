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
    <link rel="stylesheet" href="./../CSS/faqprueba.css">
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <nav class="header__nav">
            <div class="nav__image__logo">
                <a href="/HTML/home.html" class="container_logo"><img src="/image/green__eyu__logo.png" alt=""></a>
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
            <div class="content">
                <h2>Preguntas Frecuentes</h2>
                <details>
                    <summary>¿Cómo puedo encontrar una universidad adecuada para mí? </summary>
                    <p>Para elegir la universidad adecuada, considera factores como los programas académicos ofrecidos y su reputación, la ubicación geográfica y ambiente del campus,
                    los costos y opciones de financiamiento, las actividades extracurriculares y vida estudiantil, y las oportunidades de pasantías y conexiones profesionales.</p>
                  </details>
                  <details>
                    <summary>¿Qué es un recorrido virtual de universidad?</summary>
                    <p>Es una herramienta interactiva que permite a los usuarios explorar el campus y las instalaciones de una universidad a través de internet. Este tipo de recorrido
                    utiliza tecnología de visualización en 3D, fotografías panorámicas y videos para ofrecer una experiencia inmersiva, donde los potenciales estudiantes pueden ver aulas, 
                    laboratorios, bibliotecas, áreas recreativas y otros espacios importantes sin necesidad de estar físicamente presentes.</p>
                  </details>
                  <details>
                    <summary>¿Qué tipos de programas académicos ofrecen las universidades?</summary>
                    <p>Las universidades ofrecen una variedad de programas, incluyendo grados de licenciatura en diversas disciplinas, programas de posgrado (maestrías y doctorados), 
                    certificados y diplomas en áreas específicas, y programas de educación continua y formación profesional.</p>
                  </details>
                  <details>
                    <summary>¿Qué apoyo académico ofrecen las universidades?</summary>
                    <p>Las universidades suelen ofrecer recursos de apoyo académico, como tutorías y sesiones de estudio, asesoramiento académico y orientación profesional, bibliotecas
                    y recursos en línea, y servicios de salud mental y bienestar.</p>
                  </details>
                  <details>
                    <summary>¿Qué es la vida estudiantil en la universidad?</summary>
                    <p>La vida estudiantil incluye todas las actividades y experiencias fuera del aula, como organizaciones estudiantiles y clubes, eventos sociales y culturales, actividades
                    deportivas y recreativas, y oportunidades de voluntariado y servicio comunitario.</p>
                  </details>
            </div>
        </main>
        <div class="fox-container">
            <img src="./../image/FOX ranking.JPG" alt="Fox" class="fox-icon">
        </div>
        <div class="ask">
            <a href="./../HTML/reali_preg.html" class="ask-button">Realizar una pregunta</a>
        </div>
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
</body>
</html>
