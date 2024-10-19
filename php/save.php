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

    // Verificar si la universidad ya está guardada
    $checkSql = "SELECT COUNT(*) FROM Universidades_guardadas WHERE Id_cuenta = $idUser AND Id_universidad = $idUniversity";
    $exists = $conexion->consultar($checkSql);

    if ($exists[0][0] == 0) { // Si no existe, se puede insertar
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
                alert("La universidad ya está guardada.");
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
