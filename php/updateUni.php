<?php

// Incluye el archivo de conexión
require_once 'conexion_bd.php';

// Asegúrate de validar y sanitizar las entradas en producción
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcionUniversidad'];
$tipo = $_POST['tipo'];
$url = $_POST['url'];
$numero = $_POST['numero'];
$smza = $_POST['smza'];
$mza = $_POST['mza'];
$calle = $_POST['calle'];
$lote = $_POST['lote'];
$cp = $_POST['cp'];
$carreras = $_POST['carreras']; // Este es un string JSON de carreras

// Instanciar la clase de conexión
$conexion = new conexion();

try {
    // Actualizar la universidad
    $sql = "UPDATE universidades SET 
                Nombre = :nombre,
                Descripcion = :descripcion,
                Tipo_de_Universidad = :tipo,
                URL_pagina = :url,
                Correo_contacto = :numero
            WHERE Id_universidad = :id";

    $sentencia = $conexion->conexion->prepare($sql);
    $actualizado = $sentencia->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':tipo' => $tipo,
        ':url' => $url,
        ':numero' => $numero,
        ':id' => $id
    ]);

    if (!$actualizado) {
        throw new Exception("Error al actualizar la universidad.");
    }

    // Actualizar la dirección
    $sql = "UPDATE direccion SET 
                Calle = :calle,
                Supermanzana = :smza,
                Manzana = :mza,
                Lote = :lote,
                CP = :cp
            WHERE ID_Direccion = (SELECT ID_Direccion FROM universidades WHERE Id_universidad = :id)";

    $sentencia = $conexion->conexion->prepare($sql);
    $actualizadoDireccion = $sentencia->execute([
        ':calle' => $calle,
        ':smza' => $smza,
        ':mza' => $mza,
        ':lote' => $lote,
        ':cp' => $cp,
        ':id' => $id
    ]);

    if (!$actualizadoDireccion) {
        throw new Exception("Error al actualizar la dirección.");
    }

    // Manejar la imagen
    if (!empty($_FILES['imagen']['name'])) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = 'C:/xampp1/htdocs/EYU Integradora/image/ImagenesUni/' . $imagen;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
            // Actualizar la imagen en la base de datos
            $sql = "UPDATE universidades SET image = :image WHERE ID_Universidad = :id";
            $sentencia = $conexion->conexion->prepare($sql);
            $actualizadoImagen = $sentencia->execute([
                ':image' => $ruta,
                ':id' => $id
            ]);

            if (!$actualizadoImagen) {
                throw new Exception("Error al actualizar la imagen.");
            }
        } else {
            throw new Exception("Error al subir la imagen.");
        }
    }

    // Eliminar carreras existentes
    $sql = "DELETE FROM universidad_carrera WHERE Id_universidad = :id";
    $sentencia = $conexion->conexion->prepare($sql);
    $eliminadoCarreras = $sentencia->execute([':id' => $id]);

    if (!$eliminadoCarreras) {
        throw new Exception("Error al eliminar las carreras existentes.");
    }

    // Insertar nuevas carreras
    $carreras = json_decode($carreras, true); // Decodificar el JSON a un array
    foreach ($carreras as $carrera) {
        $sql = "INSERT INTO universidad_carrera (Id_universidad, Id_carrera) VALUES (:id_universidad, :id_carrera)";
        $sentencia = $conexion->conexion->prepare($sql);
        $insertadoCarrera = $sentencia->execute([
            ':id_universidad' => $id,
            ':id_carrera' => $carrera['id'] // Asumiendo que cada carrera tiene un ID
        ]);

        if (!$insertadoCarrera) {
            throw new Exception("Error al insertar la carrera " . htmlspecialchars($carrera['id']));
        }
    }

    // Redireccionar o mostrar un mensaje de éxito
    header('Location: ./../Admin/');
    exit;

} catch (Exception $e) {
    // Manejo de errores
    echo "Error: " . htmlspecialchars($e->getMessage());
    // Opcional: Puedes redirigir a una página de error o mostrar un mensaje al usuario
}
