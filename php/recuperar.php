<?php

if (!empty($_POST['rc_recuperar-btn'])) {
    $conexion_recuperar = new mysqli('127.0.0.1', 'root', 'root', 'eyu'); // Conexión a la base de datos EYU
    // if ($conexion) {
    //     echo 'Conexion exitosa';
    // } else {
    //     echo 'Error en la conexion';
    // } 

    $rc_Correo = $_POST['rc_email'];
    $rc_Contrasena = $_POST['rc_password'];


    if (!empty($rc_Correo)) {
        $Consulta_Sql = "SELECT * FROM Cuentas WHERE Correo = ?";
        $stmt = $conexion_recuperar->prepare($Consulta_Sql);
        $stmt->bind_param("s", $rc_Correo);
        $stmt->execute();
        $Resul_Consulta = $stmt->get_result();
        $row = $Resul_Consulta->fetch_assoc();

        if ($row) {
            //$correoBd = $row['Correo'];

            $Actualizar = "UPDATE Cuentas SET Contraseña=? WHERE Correo=?";
            $Act_Con = $conexion_recuperar->prepare($Actualizar);
            $Act_Con->bind_param("ss", $rc_Contrasena, $rc_Correo);

            if ($Act_Con->execute()) {
                header('location: ./../HTML/login.php');
            } else {
                echo '<script> alert("Error al actualizar)</script>';
            }
        } else {
            echo '<script> alert("Correo incorrecto"); window.location.href = "./../HTML/recuperar.php" </script>';
            exit();
        }
    } else {
        echo '<script> alert("Campos vacios"); window.location.href = "./../HTML/recuperar.php" </script>';
    }
}
