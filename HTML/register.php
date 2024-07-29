<?php 
include './../php/register.php';
//  $username = '';
//  $email = '';
//  $password = '';
//  $repeatPassword = '';


?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.cdnfonts.com/css/omegle" rel="stylesheet">
    <link rel="stylesheet" href="./../CSS/register.css">
</head>

<body>
    <section class="wrapper">
        <div class="container__login">
            <form class="form__login" method="post" action="./../php/register.php" id="register-form">
                <div class="container__logo">
                    <img src="../image/eyu logo.png" alt="">
                </div>
                <h1>Registrarse</h1>
                <div class="form__item form__item--line"></div>
                <label class="form__item" for="user__input">Usuario</label>
                <input class="form__item form__item--input" type="text" id="user__input" placeholder="boki12_delgado"
                    name="r_username">
                <label class="form__item" for="email__input">Correo Electrónico</label>
                <input class="form__item form__item--input" type="email" id="email__input"
                    placeholder="ejemplo@gmail.com" name="r_email">
                <label class="form__item" for="password__input">Contraseña</label>
                <input class="form__item form__item--input" type="password" name="r_password" id="password__input"
                    placeholder="**********">
                <label class="form__item" for="repeatPassword__input">Repetir Contraseña</label>
                <input class="form__item form__item--input" type="password" id="repeatPassword__input"
                    placeholder="**********" name="r_repeatPassword">
                <input class="form__item form__item--input form__inputSubmit" type="submit" value="Comenzar"
                    name="register-btn">
                <p class="form__pDontAccount">¿Tienes una cuenta? <a href="./../HTML/login.php">Inicia sesión</a></p>
            </form>
            <div class="login__img">
                <img src="./../image/Img-login.jpg" alt="">
            </div>
        </div>
    </section>

    <script>
        // Function to load stored data into the form
        function loadFormData() {
            document.getElementById('user__input').value = localStorage.getItem('username') || '';
            document.getElementById('email__input').value = localStorage.getItem('email') || '';
            document.getElementById('password__input').value = localStorage.getItem('password') || '';
            document.getElementById('repeatPassword__input').value = localStorage.getItem('repeatPassword') || '';
        }

        // Function to save form data to localStorage
        function saveFormData() {
            localStorage.setItem('username', document.getElementById('user__input').value);
            localStorage.setItem('email', document.getElementById('email__input').value);
            localStorage.setItem('password', document.getElementById('password__input').value);
            localStorage.setItem('repeatPassword', document.getElementById('repeatPassword__input').value);
        }

        // Load form data when the page loads
        document.addEventListener('DOMContentLoaded', loadFormData);

        // Save form data when the form is about to be submitted
        document.getElementById('register-form').addEventListener('submit', saveFormData);
    </script>
</body>

</html>
