<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $userId = $_SESSION['id_usuario'];

        // Crear una instancia de la clase de conexión
        $conexion = new Conexion();

        // Preparar la consulta SQL
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $params = [$userId];

        // Ejecutar la consulta
        $conexion->modificar($sql, $params);

        // Cerrar la sesión
        session_destroy();

        echo "Cuenta eliminada con éxito";
    } catch (Exception $e) {
        echo "Error al eliminar la cuenta: " . $e->getMessage();
    }
} else {
    echo "Método no permitido";
}
?>
