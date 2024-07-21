<?php
include 'conexion_bd.php';


if (!empty($_POST['register-btn'])) {

    if (($username or $email or $password or $repeatPassword) < strlen(1) ) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];
    
    
    
        echo 'user ' . $username . ' email' . $email . ' pass' . $password . ' passRP' . $repeatPassword;
    }

} else {
    echo '<script> alert("datos vacios") </script>';
}
