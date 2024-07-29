<?php 

include("./../php/loginLogic.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.cdnfonts.com/css/omegle" rel="stylesheet">
    <link rel="stylesheet" href="./../CSS/login.css">
</head>
<body>
    <section class="wrapper">
        <div class="container__login">
            <form class="form__login" action="./../php/loginlogic.php" method="post">
                <div class="container__logo">
                    <img src="./../image/eyu logo.png" alt="">
                </div>
                <h1>Iniciar Sesión</h1>
                <div class="form__item form__item--line"></div>
                <label class="form__item" for="email__input">Correo Electrónico</label>
                <input id="email" class="form__item form__item--input" type="text"  id="email__input" placeholder="ejemplo@gmail.com" name="I_email">
                <label class="form__item" for="password__input">Contraseña</label>
                <input id="pass" class="form__item form__item--input" type="password" id="password__input" placeholder="**********" name="I_password">
                <p class="form__item p__forgotPassword">¿Has olvidado la <a href="./recuperar.php" class="a__forgotPassword">Contraseña</a>?</p>
                <input class="form__item form__item--input form__inputSubmit" type="submit" value="Comenzar" name="I_login-btn">
                <p class="form__pDontAccount">¿No tienes una cuenta? <a href="./../HTML/register.php">Registrate</a></p>
            </form>
            <div class="login__img">
                <img src="./../image/Img-login.jpg" alt="">
            </div>
        </div>
    </section>
</body>
</html>