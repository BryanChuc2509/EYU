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
                <!-- <div id="container1" class="container-md">
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
                </div> -->

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
                    echo '        <a class="btn-delete" href="./../php/deleteUni.php?id=' . urlencode($fila["ID_Universidad"]) . '" onclick="return confirmarEliminacion();">Eliminar</a>';
                    // echo '        <a class="btn-update" href="updateUni.php?id=' . urlencode($fila["ID_Universidad"]) . '">Actualizar</a>';
                    echo '    </div>';
                    echo '</div>';
                }



                // if (!empty($_GET)) {
                //     $idUniversidad = $_GET['id'];

                //     try {
                //         // 1. Eliminar las relaciones en universidad_carrera
                //         $sqlEliminarCarreras = "DELETE FROM universidad_carrera WHERE Id_universidad = ?";
                //         $stmt = $conexion->conexion->prepare($sqlEliminarCarreras);
                //         $stmt->execute([$idUniversidad]);

                //         // 2. Eliminar la universidad
                //         $sqlEliminarUniversidad = "DELETE FROM universidades WHERE ID_Universidad = ?";
                //         $stmt = $conexion->conexion->prepare($sqlEliminarUniversidad);
                //         $stmt->execute([$idUniversidad]);

                //         // 3. Eliminar la dirección de la universidad
                //         $sqlEliminarDireccion = "DELETE FROM direccion WHERE ID_Direccion = (SELECT ID_Direccion FROM universidades WHERE ID_Universidad = ?)";
                //         $stmt = $conexion->conexion->prepare($sqlEliminarDireccion);
                //         $stmt->execute([$idUniversidad]);

                //         // Confirmar transacción
                //         $conexion->conexion->commit();

                //         // Feedback al usuario
                //         echo '<script> 
                //             alert("Universidad eliminada con éxito."); 
                //             window.location.href = "./../Admin/catalogue.php"; // Redirigir a la lista de universidades
                //         </script>';
                //     } catch (Exception $e) {
                //         // Revertir transacción en caso de error
                //         $conexion->conexion->rollBack();
                //         echo '<script> 
                //             alert("Error al eliminar la universidad: ' . $e->getMessage() . '"); 
                //             window.location.href = "./../Admin/listUniversidades.php"; // Redirigir a la lista de universidades
                //         </script>';
                //     }
                // } else {
                //     echo '<script> 
                //         alert("No se ha especificado una universidad para eliminar."); 
                //         window.location.href = "./../Admin/listUniversidades.php"; // Redirigir a la lista de universidades
                //     </script>';
                // }


                ?>

            </div>

            <script>
                function confirmarEliminacion() {
                    return confirm('¿Estás seguro de que deseas eliminar este registro?');
                }
            </script>

            <style>
                #AddUniversity {
                    cursor: pointer;

                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    const botonAddUni = document.getElementById('AddUniversity');

                    function manejarClick() {
                        window.location.href = "./addUniversity.php";
                    }
                    botonAddUni.addEventListener('click', manejarClick);
                });
            </script>
            <div class="main__secondPart__AddUniversity">
                <button class="btn-add" id="AddUniversity">
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