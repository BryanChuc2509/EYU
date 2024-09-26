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
            <form class="form__login" action="./../php/loginlogic.php" method="post" id="loginForm">
                <div class="container__logo">
                    <img src="./../image/eyu logo.png" alt="">
                </div>
                <h1>Iniciar Sesión</h1>
                <div class="form__item form__item--line"></div>
                <label class="form__item" for="email">Correo Electrónico</label>
                <input id="email" class="form__item form__item--input" type="text"  placeholder="ejemplo@gmail.com" name="I_email">
                <label class="form__item" for="pass">Contraseña</label>
                <input id="pass" class="form__item form__item--input" type="password" placeholder="**********" name="I_password">
                <p class="form__item p__forgotPassword">¿Has olvidado la <a href="./recuperar.php" class="a__forgotPassword">Contraseña</a>?</p>
                <input class="form__item form__item--input form__inputSubmit" type="submit" value="Comenzar" name="I_login-btn">
                <p class="form__pDontAccount">¿No tienes una cuenta? <a href="./../HTML/register.php">Registrate</a></p>
            </form>
            <div class="login__img">
                <img src="./../image/Img-login.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- <script>
        // Function to load stored data into the form
        function loadFormData() {
            document.getElementById('email').value = localStorage.getItem('correo') || '';
            document.getElementById('pass').value = localStorage.getItem('contrasena') || '';
        }

        // Function to save form data to localStorage
        function saveFormData() {
            localStorage.setItem('correo', document.getElementById('email').value);
            localStorage.setItem('contrasena', document.getElementById('pass').value);
        }
        // Load form data when the page loads
        document.addEventListener('DOMContentLoaded', loadFormData);

        // Save form data when the form is about to be submitted
        document.getElementById('loginForm').addEventListener('submit', saveFormData);
    </script> -->
</body>
</html>