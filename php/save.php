<?php
session_start();
include("conexion_bd.php");

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Id_usuario'])) {
    die('Usuario no autenticado');
}

$idUser = $_SESSION['Id_usuario'];
$conexion = new conexion();

// Verificar si 'id' está presente en la solicitud GET
if (!empty($_GET['id'])) {
    $idUniversity = intval($_GET['id']); // Sanitizar la entrada convirtiendo a entero

    // Preparar la consulta SQL
    $sql = "INSERT INTO Universidades_guardadas (Id_cuenta, Id_universidad) VALUES ($idUser, $idUniversity)";
    
    // Ejecutar la consulta
    $resultado = $conexion->modificar($sql);

    if ($resultado) {
        echo '<script> 
                alert("Universidad guardada con éxito");
                window.location.href = "./../HTML/catalogue.php";
            </script>';
    } else {
        echo '<script> 
                alert("Error al guardar la universidad");
                window.location.href = "./../HTML/catalogue.php";
            </script>';
    }
} else {
    echo '<script> 
            alert("ID de universidad no proporcionado.");
            window.location.href = "./../HTML/catalogue.php";
        </script>';
}

// Cerrar la conexión a la base de datos
// $conexion->close();
?>
