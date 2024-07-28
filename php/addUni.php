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

function validarURL($url)
{
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

function validarCorreo($correo)
{
    return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
}

function validarNumero($numero)
{
    return is_numeric($numero) && $numero >= 0;
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario y sanitizar
    $datos = [
        'nombre' => htmlspecialchars($_POST['nombre']),
        'descripcion' => htmlspecialchars($_POST['descripcion']),
        'tipo' => htmlspecialchars($_POST['tipo']),
        'url' => htmlspecialchars($_POST['url']),
        'correo' => htmlspecialchars($_POST['correo']),
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
    if (empty($datos['tipo']) || !in_array($datos['tipo'], ['1', '2'])) $errores[] = "Selecciona un tipo válido para la universidad.";
    if (!validarURL($datos['url'])) $errores[] = "La URL proporcionada no es válida.";
    if (!validarCorreo($datos['correo'])) $errores[] = "El correo electrónico proporcionado no es válido.";
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
        // Mostrar datos
        echo "<h1>Datos Recibidos</h1>";
        echo "<h2>Información General</h2>";
        echo "<p><strong>Nombre:</strong> {$datos['nombre']}</p>";
        echo "<p><strong>Descripción:</strong> {$datos['descripcion']}</p>";
        echo "<p><strong>Tipo:</strong> " . ($datos['tipo'] == "1" ? "Pública" : "Privada") . "</p>";
        echo "<p><strong>URL:</strong> {$datos['url']}</p>";
        echo "<p><strong>Correo:</strong> {$datos['correo']}</p>";

        echo "<h2>Dirección</h2>";
        echo "<p><strong>Smza:</strong> {$datos['smza']}</p>";
        echo "<p><strong>Mza:</strong> {$datos['mza']}</p>";
        echo "<p><strong>Calle:</strong> {$datos['calle']}</p>";
        echo "<p><strong>Lote:</strong> {$datos['lote']}</p>";
        echo "<p><strong>C.P.:</strong> {$datos['cp']}</p>";

        echo "<h2>Carreras</h2>";
        if (!empty($datos['carreras'])) {
            echo "<ul>";
            foreach ($datos['carreras'] as $carrera) {
                echo "<li>$carrera</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se han agregado carreras.</p>";
        }

        // Mostrar la imagen
        if ($imageURL) {
            echo "<h2>Imagen de la Universidad</h2>";
            echo "<img src='$imageURL' alt='Imagen Universidad' style='max-width: 100%; height: auto;'>";
        } else {
            echo "<p>No se ha cargado ninguna imagen.</p>";
        }

        // Insertar datos en la base de datos
        $conexion = new conexion();
        $nombreUniversidad = $datos['nombre'];

        // Verificar si la universidad ya está registrada
        $sql = "SELECT Nombre FROM universidades WHERE Nombre = '$nombreUniversidad'";
        $result = $conexion->consultar($sql);

        if (count($result) > 0) {
            echo "<script>
                alert('`$nombreUniversidad` ya registrada');
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
            $sqlUniversidad = "INSERT INTO universidades 
                               (Nombre, Descripcion, Tipo_de_Universidad, URL_pagina, Correo_contacto, image, ID_Direccion) 
                               VALUES 
                               ('{$datos['nombre']}', '{$datos['descripcion']}', '{$datos['tipo']}', '{$datos['url']}', '{$datos['correo']}', '$imageURL', $idDireccion)";
            $conexion->modificar($sqlUniversidad);

            // Feedback al usuario
            echo "<script>
                alert('Universidad registrada con éxito');
                window.location.href = './../Admin/addUniversity.php';
            </script>";
        }
    }
} else {
    echo "<p>No se han recibido datos del formulario.</p>";
}
?>
