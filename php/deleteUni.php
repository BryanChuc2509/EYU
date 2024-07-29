<?php

include("conexion_bd.php");

if (!empty($_GET['id'])) {
    $idUniversidad = htmlspecialchars($_GET['id']);

    // Crear una instancia de la conexión
    $conexion = new conexion();
    $conexion->conexion->beginTransaction();

    try {
        // 1. Eliminar las relaciones en universidad_carrera
        $sqlEliminarCarreras = "DELETE FROM universidad_carrera WHERE Id_universidad = ?";
        $stmt = $conexion->conexion->prepare($sqlEliminarCarreras);
        $stmt->execute([$idUniversidad]);

        // 2. Eliminar la universidad
        $sqlEliminarUniversidad = "DELETE FROM universidades WHERE ID_Universidad = ?";
        $stmt = $conexion->conexion->prepare($sqlEliminarUniversidad);
        $stmt->execute([$idUniversidad]);

        // 3. Eliminar la dirección de la universidad
        $sqlEliminarDireccion = "DELETE FROM direccion WHERE ID_Direccion = (SELECT ID_Direccion FROM universidades WHERE ID_Universidad = ?)";
        $stmt = $conexion->conexion->prepare($sqlEliminarDireccion);
        $stmt->execute([$idUniversidad]);

        // Confirmar transacción
        $conexion->conexion->commit();

        // Feedback al usuario
        echo '<script>
            alert("Universidad eliminada con éxito.");
            window.location.href = "./../Admin/catalogue.php"; // Redirigir a la lista de universidades
        </script>';
    } catch (Exception $e) {
        // Revertir transacción en caso de error
        $conexion->conexion->rollBack();
        echo '<script>
            alert("Error al eliminar la universidad: ' . addslashes($e->getMessage()) . '");
            window.location.href = "./../Admin/catalogue.php"; // Redirigir a la lista de universidades
        </script>';
    }
} else {
    echo '<script>
        alert("No se ha especificado una universidad para eliminar.");
        window.location.href = "./../Admin/catalogue.php"; // Redirigir a la lista de universidades
    </script>';
}
