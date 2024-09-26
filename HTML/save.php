<?php
session_start();


// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}

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

    <style>
.a__title:link {
    color: #165e46e8;
}
.a__title:visited {
    color: #165e46e8;
}



.a__title {
    text-decoration: none;
}
.a__title:hover {
    text-decoration: underline;
}

    </style>

    </style>
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


            <div class="main__firstPart">
                <h1>Tus favoritos</h1>

                <?php
                $conexion = new conexion();
                $idUser = $_SESSION['Id_usuario'];

                // Realizar la consulta
                $sql = "SELECT u.ID_Universidad, u.Nombre, u.image, u.descripcion FROM cuentas c
            INNER JOIN Universidades_guardadas ug 
            ON c.ID_Cuenta = ug.Id_cuenta
            INNER JOIN Universidades u
            ON ug.Id_universidad = u.ID_Universidad 
            WHERE ug.Id_cuenta = $idUser;";
                $resultado = $conexion->consultar($sql);

                if ($resultado) {
                    $container = 1;

                    foreach ($resultado as $fila) {
                        // Output the opening div with a unique ID
                        echo "<div id=\"container-$container\" class=\"container-md\">";
                        echo '    <div class="container-md__container__imgUniversity">';
                        echo '        <img src="' . htmlspecialchars($fila['image']) . '" alt="Logo de ' . htmlspecialchars($fila['Nombre']) . '">';
                        echo '        <button class="delete" data-id="' . htmlspecialchars($fila['ID_Universidad']) . '" onclick="deleteUniversity(this)">';
                        echo '            <i class="fa-solid fa-trash"></i>';
                        echo '        </button>';
                        echo '    </div>';
                        echo '    <div class="container-md__container__infoUniversity">';
                        echo '        <h2><a class="a__title" href="profileUni.php?id=' . htmlspecialchars($fila['ID_Universidad']) . '">' . htmlspecialchars($fila['Nombre']) . '</a></h2>';
                        echo '        <p class="ellipsis">' . htmlspecialchars($fila['descripcion']) . '</p>';
                        echo '    </div>';
                        echo '</div>';
                        $container++;
                    }
                } else {
                    echo "<div class=\"container-md\">";
                    echo '    <div class="container-md__container__infoUniversity">';
                    echo '        <h2>Ups! Parece que no hay universidades guardadas</h2>';
                    echo '        <p>Sigue explorando para añadir universidades a tus favoritos.</p>';
                    echo '    </div>';
                    echo '</div>';
                }


                ?>
            </div>

            <script>
                function deleteUniversity(button) {
                    var universityId = button.getAttribute('data-id');

                    if (confirm('¿Estás seguro de que deseas eliminar esta universidad de tus favoritos?')) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'delete_favorite.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Eliminar el div correspondiente
                                    button.closest('.container-md').remove();
                                } else {
                                    alert('Hubo un error al intentar eliminar la universidad.');
                                }
                            }
                        };

                        xhr.send('id_universidad=' + encodeURIComponent(universityId));
                    }
                }
            </script>



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


</body>

</html>