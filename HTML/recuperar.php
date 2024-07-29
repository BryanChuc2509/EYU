<?php
     include("../php/recuperar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../CSS/recover.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <h1>Cambiar contraseña</h1>
            <div class="container__logo">
                <img src="./../image/eyu logo.png" alt="">
            </div>
            <form action="./../php/recuperar.php" class="form" method="post">
                <!-- <label for="correo">email del usuario</label> -->
                <input class="form__input" id="newPassword" type="text" placeholder="email registrado" name="rc_email">
                <!-- <label for="repeatPassword">Repetir contraseña</label> -->
                <input class="form__input" type="password" id="repeatPassword" placeholder="Contraseña Nueva" name="rc_password">
                <input class="form__input" type="submit" value="Cambiar Contraseña" name="rc_recuperar-btn">
            </form>
        </div>
        <div class="returnLogin">
            <p>Volver a <a href="./../HTML/login.php">Iniciar sesión</a></p>
        </div>
    </section>

</body>

</html>