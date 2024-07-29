<?php

session_start();
include("conexion_bd.php");

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}

// Obtener el nombre de usuario y definir la hora
$id = htmlspecialchars($_SESSION['Id_usuario']);
$username = htmlspecialchars($_SESSION['Nombre_de_Usuario']);
$email = htmlspecialchars($_SESSION['Correo']);
$contraseña = htmlspecialchars($_SESSION['Contraseña']);

// Validar URL, correo y número
function validarURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

function validarNumero($numero) {
    return is_numeric($numero) && $numero >= 0;
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario y sanitizar
    $datos = [
        'nombre' => htmlspecialchars($_POST['nombre']),
        'descripcion' => htmlspecialchars($_POST['descripcionUniversidad']),
        'tipo' => htmlspecialchars($_POST['tipo']),
        'url' => htmlspecialchars($_POST['url']),
        'numero' => htmlspecialchars($_POST['numero']),
        'smza' => htmlspecialchars($_POST['smza']),
        'mza' => htmlspecialchars($_POST['mza']),
        'calle' => htmlspecialchars($_POST['calle']),
        'lote' => htmlspecialchars($_POST['lote']),
        'cp' => htmlspecialchars($_POST['cp']),
        'carreras' => isset($_POST['carreras']) ? json_decode($_POST['carreras'], true) : []
    ];

    // Validar campos
    if (empty($datos['nombre'])) $errores[] = "El nombre de la universidad es obligatorio.";
    if (empty($datos['descripcion'])) $errores[] = "La descripción es obligatoria.";
    if (empty($datos['tipo']) || !in_array($datos['tipo'], ['publica', 'privada'])) $errores[] = "Selecciona un tipo válido para la universidad.";
    if (!validarURL($datos['url'])) $errores[] = "La URL proporcionada no es válida.";
    if (!($datos['numero'])) $errores[] = "El número telefónico proporcionado no es válido.";
    if (!validarNumero($datos['smza'])) $errores[] = "El campo Smza debe ser un número válido.";
    if (!validarNumero($datos['mza'])) $errores[] = "El campo Mza debe ser un número válido.";
    if (!validarNumero($datos['lote'])) $errores[] = "El campo Lote debe ser un número válido.";
    if (!validarNumero($datos['cp'])) $errores[] = "El código postal debe ser un número válido.";

    // Manejo de la imagen
    $imageURL = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        $uploadFileDir = 'C:/xampp1/htdocs/EYU Integradora/image/ImagenesUni/';
        $dest_path = $uploadFileDir . $fileName;

        if (in_array($fileExtension, $allowedExts) && move_uploaded_file($fileTmpPath, $dest_path)) {
            $imageURL = './../image/ImagenesUni/' . $fileName;
        } else {
            $errores[] = "Tipo de archivo no permitido o error al mover el archivo cargado.";
        }
    } else if ($_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $errores[] = "Hubo un error al cargar la imagen.";
    }

    // Mostrar errores
    if (!empty($errores)) {
        $errores_js = json_encode($errores);
        echo "<script>
                var errores = $errores_js;
                errores.forEach(function(error) {
                    alert(error);
                });
                window.location.href = './../Admin/addUniversity.php';
            </script>";
    } else {

        // Insertar datos en la base de datos
        $conexion = new conexion();
        $nombreUniversidad = $datos['nombre'];

        // Verificar si la universidad ya está registrada
        $sql = "SELECT Nombre FROM universidades WHERE Nombre = '$nombreUniversidad'";
        $result = $conexion->consultar($sql);

        if (count($result) > 0) {
            echo "<script>
                alert('`$nombreUniversidad` ya está registrada.');
                window.location.href = './../Admin/addUniversity.php';
            </script>";
        } else {
            // Insertar datos en la tabla direccion
            $sqlDireccion = "INSERT INTO direccion (calle, Supermanzana, Manzana, Lote, CP) 
                            VALUES ('{$datos['calle']}', '{$datos['smza']}', '{$datos['mza']}', '{$datos['lote']}', '{$datos['cp']}')";
            $conexion->modificar($sqlDireccion);

            // Obtener el ID de la última dirección insertada
            $idDireccion = $conexion->conexion->lastInsertId();

            // Insertar datos en la tabla universidades
            $sqlUniversidad = "INSERT INTO universidades (Nombre, Descripcion, Tipo_de_Universidad, URL_pagina, Correo_contacto, image, ID_Direccion) 
                            VALUES ('{$datos['nombre']}', '{$datos['descripcion']}', '{$datos['tipo']}', '{$datos['url']}', '{$datos['numero']}', '$imageURL', $idDireccion)";
            $conexion->modificar($sqlUniversidad);

            // Insertar carreras en la base de datos
            if (!empty($datos['carreras'])) {
                foreach ($datos['carreras'] as $carrera) {
                    $nombreCarrera = htmlspecialchars($carrera['nombre']);
                    $descripcionCarrera = htmlspecialchars($carrera['descripcion']);
                    $duracionCarrera = htmlspecialchars($carrera['duracion']);
                    $sqlCarrera = "INSERT INTO carreras (Nombre, Descripcion, Duracion) 
                                   VALUES ('$nombreCarrera', '$descripcionCarrera', '$duracionCarrera')";
                    $conexion->modificar($sqlCarrera);

                    // Obtener el ID de la última carrera insertada
                    $idCarrera = $conexion->conexion->lastInsertId();

                    // Asociar la carrera con la universidad
                    $sqlUniversidadCarrera = "INSERT INTO universidad_carrera (Id_universidad, Id_carrera) 
                                              VALUES ((SELECT ID_Universidad FROM universidades WHERE Nombre = '$nombreUniversidad'), $idCarrera)";
                    $conexion->modificar($sqlUniversidadCarrera);
                }
            }

            // Feedback al usuario
            echo "<script>
                alert('Universidad registrada con éxito');
                window.location.href = './../Admin/addUniversity.php';
            </script>";
        }
    }
} else {
    echo "<script>
    alert('No se han recibido datos del formulario');
    window.location.href = './../Admin/addUniversity copy.php';
</script>";
}
?>
