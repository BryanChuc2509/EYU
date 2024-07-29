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

    .main {
        display: flex;
        flex-wrap: wrap;
        width: 95%;
        gap: 20px;
    }

    h1,
    h2 {
        font-family: "OMEGLE", sans-serif;
        color: #164738;
        font-weight: 100;
    }

    h1 {
        margin-top: 20px;
    }

    h2 {
        margin-top: 10px;
    }

    .container-md {
        display: grid;
        grid-template-areas:
            "img info"
            "buttons buttons";
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto;
        background-color: #e4dfa9;
        border-radius: 25px;
        width: 100%;
        max-width: 800px;
        padding: 20px 20px 5px 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: filter 1s;
    }

    .container-md img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-right: 20px;
        transition: filter 0.3s ease;
    }

    .main__firstPart h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .container-md__container__imgUniversity {
        grid-area: img;
        overflow: hidden;
        margin-right: 20px;
        position: relative;
    }

    .container-md__container__imgUniversity img {
        border-radius: 8px;
    }

    .ellipsis {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5em;
        max-height: 6em;
    }

    .container-md__container__infoUniversity {
        margin-left: 0;
        grid-area: info;
        align-self: center;
    }

    .btn-comantarios {
        display: flex;
        justify-content: space-around;
        grid-area: buttons;
    }

    .btn-comantarios a {
        margin-top: 10px;
        display: block;
        padding: 10px 0;
        width: min(300px, 100%);
        text-align: center;
        border: none;
        border-radius: 25px;
        text-decoration: none;
        font-size: 1.2rem;
    }

    .btn-comantarios a:visited,
    .btn-comantarios a:link {
        color: #1f1d1d;
    }

    .btn-comentariosLink {
        background-color: #db8a39;
        margin-right: 2px;
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

    .container-md__container__imgUniversity {
    grid-area: img;
    overflow: hidden;
    margin-right: 20px;
    position: relative;
}

.container-md__container__imgUniversity img {
    border-radius: 8px;
}

.ellipsis {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 4;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.5em;
    max-height: 6em;
}

.container-md__container__infoUniversity {
    margin-left: 0;
    grid-area: info;
    align-self: center;
}

.btns-updateDelete {
    display: flex;
    justify-content: space-around;
    grid-area: buttons;
}

.btns-updateDelete a {
    margin-top: 10px;
    display: block;
    /* padding: 10px 100px 10px 100px; */
    padding: 10px 0;
    width: min(300px, 100%);
    text-align: center;
    border: none;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1.2rem;
}
.btns-updateDelete a:visited, .btns-updateDelete a:link  {
    color: #e4dfa9;     color: #1f1d1d;

}

.btn-delete {
    background-color: #db8a39;
    margin-right: 2px;
}

.btn-update {
    background-color: #789977;
    margin-left: 2px;
    color: #1f1d1d;
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
            <?php

$conexion = new conexion();

// Realizar la consulta
$sql = "SELECT ID_Universidad, Nombre, Descripcion, image FROM universidades";
$resultado = $conexion->consultar($sql);

foreach ($resultado as $fila) {
    echo '<div class="container-md">';
    echo '    <div class="container-md__container__imgUniversity">';
    echo '        <img src="' . htmlspecialchars($fila["image"]) . '" alt="imagen de ' . htmlspecialchars($fila["Nombre"]) . '">';
    echo '    </div>';
    echo '    <div class="container-md__container__infoUniversity">';
    echo '        <h2>' . htmlspecialchars($fila["Nombre"]) . '</h2>';
    echo '        <p class="ellipsis">' . htmlspecialchars($fila["Descripcion"]) . '</p>';
    echo '    </div>';
    echo '    <div class="btns-updateDelete">';
    echo '        <a class="btn-update" href="comentarioUni.php?id=' . urlencode($fila["ID_Universidad"]) . '">Ver comentarios</a>';
    echo '    </div>';
    echo '</div>';
}
?>

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
</body>

</html>