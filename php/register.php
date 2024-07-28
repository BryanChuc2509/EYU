<?php

$conexion = new mysqli('127.0.0.1', 'root', 'root', 'eyu'); // Conexión a la base de datos EYU
// if ($conexion) {
//     echo 'Conexion exitosa';
// } else {
//     echo 'Error en la conexion';
// }

// Validar campos enviados y almacenar segun sea el caso
if (!empty($_POST["register-btn"])) {
    if (empty($_POST["r_username"]) or empty($_POST["r_email"]) or empty($_POST["r_password"]) or empty($_POST["r_repeatPassword"])) {
        echo '<script> alert("datos vacios"); window.location.href = "./../HTML/register.php"; </script>'; // campos vacios
    } else { // almacenar los datos ingresados
        $Usuario = $_POST['r_username'];
        $Correo = $_POST['r_email'];
        $Contrasena = $_POST['r_password'];
        $Repetir_Contrasena = $_POST['r_repeatPassword'];

        //Variables para realizar consultas y validar datos existentes
        $Validar_usuario = $conexion->query("SELECT * FROM Cuentas WHERE Nombre_de_Usuario = '$Usuario'");
        $Validar_correo = $conexion->query("SELECT * FROM Cuentas WHERE Correo = '$Correo'");

        //Validacion de datos ingresados 
        if ($Validar_usuario->num_rows > 0) {
            echo '<script> alert("Nombre de usuario NO DISPONIBLE"); window.location.href = "./../HTML/register.php"; </script>';
        } elseif ($Validar_correo->num_rows > 0) {
            echo '<script> alert("Este correo ya ha sido registrado"); window.location.href = "./../HTML/register.php"; </script>';
        } else {
            
            if ($Contrasena !== $Repetir_Contrasena) { // validar que las contraseñas coincidan
                echo '<script> alert("Verificar que ambas contraseña coincidan"); window.location.href = "./../HTML/register.php"; </script>';
            } else { //Si no hay datos duplicados, se insertan en la bd
                $Insertar = $conexion->query("INSERT INTO Cuentas (Correo, Nombre_de_Usuario, Contraseña) VALUES ('$Correo', '$Usuario', '$Contrasena')");
                //Si la bd da como resultado 1 (datos insertados) se dirije al usuario al inicio de sesion
                
                if ($Insertar == 1) {
                    echo '<script>
                    alert("Datos registrados correctamente, Bienvenido");
                    localStorage.removeItem("username");
                    localStorage.removeItem("email");
                    localStorage.removeItem("password");
                    localStorage.removeItem("repeatPassword");
                    window.location.href = "./../HTML/login.php";
                    </script>';
                    // header('Location: ./../HTML/login.php');
                } else { // Si da resultado 0 notifica un error 
                    echo '<script>alert("Error al registrar"); window.location.href = "./../HTML/register.php";</script>';
                }
            }
        }
    }
}
