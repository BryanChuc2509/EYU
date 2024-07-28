<?php
if (!empty($_POST['I_login-btn'])) {
    $conexion_sesion = new mysqli('127.0.0.1', 'root', 'root', 'EYU');

    // Verificar conexión
    if ($conexion_sesion->connect_error) {
        die('Error en la conexión: ' . $conexion_sesion->connect_error);
    }

    $Correo = $_POST['I_email'];
    $Contrasena = $_POST['I_password'];

    // Verificar que los campos no estén vacíos
    if (!empty($Correo) && !empty($Contrasena)) {
        // Preparar consulta para verificar el correo

        $Verificar = "SELECT * FROM Cuentas WHERE Correo = ? or Nombre_de_Usuario = '$Correo'";
        $stmt = $conexion_sesion->prepare($Verificar);
        $stmt->bind_param("s", $Correo);
        $stmt->execute();
        $Resul_verificacion = $stmt->get_result();
        $row = $Resul_verificacion->fetch_assoc();

        if ($row) {
            $correoBd = $row['Correo'];
            $contrasenabd = $row['Contraseña'];
            $tipo_cuenta = $row['Tipo_Cuenta'];
            $usuario = $row["Nombre_de_Usuario"];
            $id = $row["ID_Cuenta"];
            

            // Verificar si el correo coincide y si la contraseña es correcta
            if (($Correo == $usuario or $Correo == $correoBd) and ($contrasenabd == $Contrasena)) {
                session_start();
                $_SESSION['Correo'] = $correoBd;
                $_SESSION['Nombre_de_Usuario'] = $usuario;
                $_SESSION['Id_usuario'] = $id;
                $_SESSION['Contraseña'] = $contrasenabd;

                // Redirigir según el tipo de cuenta
                if ($tipo_cuenta == 'administrador') {
                    header('Location: ./../Admin/home.php');
                } else {
                    header('Location: ./../HTML/home.php');
                }
                exit(); // Asegurarse de detener la ejecución después de redirigir
            } else {
                echo '<script>alert("Contraseña o usuario incorrecto"); window.location.href = "./../HTML/login.php";</script>';
            }
        } else {
            echo '<script>alert("Ups! Parece que no tienes una cuenta"); window.location.href = "./../HTML/login.php";</script>';
        }
    } else {
        echo '<script>alert("Verificar datos"); window.location.href = "./../HTML/login.php";</script>';
    }

    $stmt->close();
    $conexion_sesion->close();
}
?>
