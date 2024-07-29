<?php
// Incluir archivo de conexión
include 'conexion_bd.php'; // Ajusta el path según tu estructura de archivos

// Verificar si el ID está presente en la solicitud
if (!empty($_GET['id'])) {
    $idComentario = htmlspecialchars($_GET['id']);
    $conexion = new conexion();
    $sql = "DELETE FROM comentarios WHERE ID_Comentarios = $idComentario";
    
    // Ejecutar la consulta
    $resultado = $conexion->consultar($sql);

    // Verificar si la eliminación fue exitosa
    if ($resultado) {
        // Redirigir a la página anterior

        $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './../Admin/comentarios.php';
        echo "<script>alert('Error al eliminar el comentario.'); window.location.href = '{$paginaAnterior}';</script>";
    } else {
        $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './../Admin/comentarios.php';
        echo "<script>alert('Comentario eliminado exitosamente.'); window.location.href = '{$paginaAnterior}';</script>";
    }
} else {
    $paginaAnterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : './../Admin/comentarios.php';
    echo "<script>alert('ID de comentario no proporcionado.'); window.location.href = '{$paginaAnterior}';</script>";
}
