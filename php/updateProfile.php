<?php
session_start();
include("conexion_bd.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['Id_usuario'];
    $alias = htmlspecialchars($_POST['alias']);
    $password = htmlspecialchars($_POST['password']);
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);

    $conexion = new conexion();

    // Actualizar cuentas
    $sql_cuentas = "UPDATE cuentas SET Nombre_de_Usuario = :alias, Contraseña = :password WHERE ID_Cuenta = :id";
    $stmt = $conexion->$this->conexion->prepare($sql_cuentas);
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Actualizar perfiles
    $sql_perfiles = "UPDATE perfiles SET Nombre = :name, Descripcion = :description WHERE ID_Cuenta = :id";
    $stmt = $conexion->$this->conexionconexion->prepare($sql_perfiles);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Assuming the email remains unchanged
    $email = $_SESSION['Correo'];

    // Update session variables
    $_SESSION['Nombre_de_Usuario'] = $alias;
    $_SESSION['Contraseña'] = $password;

    $response = [
        'username' => $alias,
        'email' => $email
    ];

    echo json_encode($response);
}
?>
