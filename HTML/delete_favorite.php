<?php
session_start();
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}
require './../php/conexion_bd.php'; // Asegúrate de incluir el archivo que contiene la clase 'conexion'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_universidad']) && isset($_SESSION['Id_usuario'])) {
        $idUniversidad = $_POST['id_universidad'];
        $idUsuario = $_SESSION['Id_usuario'];

        // Crear instancia de la conexión
        $conexion = new conexion();

        // Preparar y ejecutar la consulta SQL
        $sql = "DELETE FROM Universidades_guardadas WHERE Id_cuenta = $idUsuario AND Id_universidad = $idUniversidad";
        $resultado = $conexion->modificar($sql);

        if ($resultado) {
            echo 'Eliminado con éxito';
        } else {
            http_response_code(500);
            echo 'Error al eliminar';
        }
    } else {
        http_response_code(400);
        echo 'Datos faltantes';
    }
}
?>
