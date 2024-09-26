<!-- session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../html/login.php"); 
    exit;
}
$username = $_SESSION['username'];
date_default_timezone_set('America/Mexico_City');
$date = date('F d, Y');

?> -->

<?php

// Verificar si la variable de sesión está establecida
// if (!isset($_SESSION['Nombre_de_Usuario'])) {
//     header('Location: ./../HTML/login.php');
//     exit();
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../CSS/reali_preg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <title>PREGUNTANOS</title>
</head>
<body>
    <div class="container">
        <header>
            <a href="./../HTML/faq.php" class="container_logo"><img src="./../image/green__eyu__logo.png" alt="Logo Company"></a><br>
            <a href="./../HTML/faq.php" class="special_boton">Volver</a>
        </header>

        <section class="contact">
            <div class="contact_box">
                <h2 class="contact_title">Preguntanos</h2>
                <p class="contact_description">Dejanos tus dudas y con gusto te responderemos</p>
            </div>
            <form action="" id="contact-form" class="contact_form" aria-autocomplete="off">
                <div class="contact_inputs">
                    <label class="contact_label">Usuario</label>
                    <input type="text" id="user-name" class="contact_input" required>
                </div>
                <div class="contact_inputs">
                    <label class="contact_label">Correo electrónico</label>
                    <input type="email" id="user-email" class="contact_input" required>
                </div>
                <div class="contact_inputs">
                    <label class="contact_label">Mensaje</label>
                    <textarea id="message" cols="30" rows="5" class="contact_textarea" required></textarea>
                </div>
                <button type="submit" class="contact_button">Enviar</button>
            </form>
        </section>
        <div class="container_box"></div>
        <aside class="info">
            <div class="info_title-box"></div>
            <h2 class="info_title">Información </h2>
            <ul class="info_list">
                <li class="info_list-item">
                    <i class='bx bxs-envelope'></i>
                    <p class="info_list-item-description">eyu.corporation@gmail.com</p>
                </li>
                <li class="info_list-item">
                    <i class='bx bxs-phone'></i>
                    <p class="info_list-item-description">(+52) 998 765 4321</p>
                </li>
                <li class="info_list-item">
                    <i class='bx bx-map'></i>
                    <p class="info_list-item-description">Carretera Cancún-Aeropuerto, S.M 299-Km. 11.5, 77565 Q.R.</p>
                </li>
            </ul>
        </aside>
        
        <div class="container_rrss">
            <a href="https://www.facebook.com/" class="container_rrss-item">
                <i class='bx bxl-facebook' ></i>
            </a>
            <a href="https://www.instagram.com/" class="container_rrss-item">
                <i class='bx bxl-instagram' ></i>
            </a>
            <a href="https://x.com/" class="container_rrss-item">
                <i class='bx bxl-twitter'></i>
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        emailjs.init('TkV5qmbXRO1dQAvLN');
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('user-name').value;
            const email = document.getElementById('user-email').value;
            const message = document.getElementById('message').value;

            emailjs.send('service_x3o5a9d','template_3izcsrl', {
                to_name: "Recipient Name",
                user_name: name,
                user_email: email,
                message: message,
            })
            .then(function(response) {
                iziToast.show({
                    message: '¡Tu mensaje fue enviado correctamente!',
                    position: 'topLeft',
                    color: 'green',
                });
            }, function(error) {
                iziToast.show({
                    message: '¡Hubo un error al enviar tu mensaje!',
                    position: 'topLeft',
                    color: 'red',
                });
            });
        });
    </script>
</body>
</html>
