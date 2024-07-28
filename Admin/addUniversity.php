<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    /* Your CSS styles */
    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        font-family: sans-serif;
        min-height: 100vh;
    }

    .header__nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }

    .nav__image__logo {
        width: 115px;
        margin-left: 20px;
    }

    .nav__image__logo img {
        width: 100%;
        height: auto;
    }

    .nav__form {
        width: 40%;
        display: flex;
    }

    .nav__form input[type="text"] {
        width: 100%;
        padding: 6px;
        border: none;
        border-radius: 25px;
        border: 2px solid #da750f;
    }

    .nav__form__button {
        display: flex;
        position: relative;
        min-width: 15%;
        height: auto;
    }

    .nav__form__button input[type="submit"] {
        width: 100%;
        margin-left: 5px;
        height: auto;
        border: none;
        border-radius: 25px;
        border: none;
        background-color: #e4dfa9;
        transition: background-color 0.8s, box-shadow 0.5s;
    }

    .nav__form__button input[type="submit"]:hover {
        box-shadow: 0 0 5px black;
        background-color: #da750f;
    }

    .fa-magnifying-glass {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .header__nav__profile {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 20px;
        background-color: #e4dfa9;
        border-radius: 25px;
        width: 70px;
        height: 40px;
        color: #164738;
        transition: background-color 0.8s, box-shadow 0.5s;
        position: relative;
        border: none;
        cursor: pointer;
    }

    .header__nav__profile:hover {
        background-color: #164738;
        box-shadow: 0 0 15px black;
    }

    .main__wrapper {
        display: flex;
    }

    .aside__nav__secondary {
        display: flex;
        justify-content: center;
        align-items: start;
        width: min(100px, 100%);
    }

    .secondary__bar__nav ul {
        list-style: none;
        text-align: center;
        padding: 20px;
        border: none;
    }

    .secondary__bar__nav li a {
        font-size: 1.8rem;
        color: #1f1d1d;
        transition: color 0.3s;
    }

    .secondary__bar__nav li a:hover {
        color: #da750f;
    }

    .secondary__bar__nav li {
        margin-bottom: 15px;
    }

    /* profile styles*/
    .menu {
        display: flex;
        padding: 10px;
        flex-direction: column;
        position: fixed;
        top: 0;
        right: -600px;
        /* Initially hide the menu off-screen */
        width: min(300px, 100%);
        height: 100%;
        background-color: #e4dfa9;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        transition: right 0.5s ease;
        z-index: 1001;
        scrollbar-width: none;
    }

    .menu.active {
        right: 0;
        /* Slide the menu into view */
    }

    .menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* padding: 20px; */
        color: black;
        margin-bottom: 10px;
        margin-top: 10px;
        font-size: 1.8em;
    }

    .menu-header .close-btn {
        cursor: pointer;
    }

    .menu__content {
        margin-top: 15px;
        width: 100%;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black */
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 1000;
        pointer-events: none;
        /* Allows clicking through the overlay when it's not active */
    }

    .overlay.active {
        opacity: 1;
        pointer-events: auto;
        /* Disables clicking through the overlay when it's active */
    }

    .menu__content__inputs {
        background-color: #d8d39f;
        margin-bottom: 5px;
        padding: 5px 5px 0 5px;
        border-radius: 15px;
    }

    .info__user span,
    .menu__item__label {
        display: block;
        font-family: 'OMEGLE', sans-serif;
        font-weight: 100;
    }


    .info__username {
        font-size: 2em;
        color: #da750f;
        margin-left: 10px;

    }

    .info__email {
        font-size: 1.2em;
        margin-left: 10px;

    }

    .menu__item__label {
        width: 100%;
        font-size: 1.3em;
        color: #164738;
    }

    .menu__item__input {
        width: 100%;
        margin: 0 0 4px 0;
        border: none;
        padding: 4px;
        border-radius: 10px;
    }

    .menu__content__btns {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        margin-top: 5px;
    }

    .menu__content__btns input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        color: aliceblue;
        font-family: 'OMEGLE';
        font-weight: 100;
        font-size: 1.3em;
    }

    .btn__delete {
        background-color: #d88634;
        cursor: pointer;

    }

    .btn__update {
        background-color: #789477;
        cursor: pointer;

    }




    .menu__content__img {
        width: 90%;
        position: absolute;
        /* margin-top: -20px; */
        left: 15px;
    }

    .menu__content__img a:link,
    .menu__content__img a:visited {
        color: #1f1d1d;
    }

    .icon__closeSesion {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 1.5em;
    }


    .menu__content__img img {
        width: 100%;
        height: auto;
    }

    /* Profile styles end*/


    .main {
        display: flex;
        flex-wrap: wrap;
        width: 95%;
        gap: 20px;
    }

    .main__firstPart {
        /* background-color: #e4dfa9; */
        border-radius: 25px;
        width: 100%;
        max-width: 800px;
        padding: 20px 20px 5px 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: filter 1s;
    }

    /* Comentarios */

    h1 {
        font-family: "OMEGLE", sans-serif;
        color: #164738;
        font-weight: 100;
        margin-top: 20px;

    }

    /* .container-md {
        background-color: #e4dfa9;
        border-radius: 25px;
        width: 100%;
        max-width: 800px;
        padding: 20px 20px 5px 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: filter 1s;
        background-color: #d88634;
    } */


    .main__firstPart h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .container-md {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .user {
        display: flex;
        align-items: center;
        color: #164738;
        width: 100%;
        gap: 20px;
    }

    /* .user i {
        margin-left: 10px;
    } */

    .container__user {
        display: flex;
        width: 100%;
        gap: 20px;
    }

    button {
        background-color: transparent;
        border: none;
    }

    .delete {
        padding: 10px;
        background-color: #164738;
        border-radius: 50%;
    }

    .fa-trash {
        font-size: 1.4rem;
        color: #fff;
    }

    .comment {
        padding: 10px 0;
    }




    .main__secondPart__img {
        width: 300px;
        height: 250px;
        margin-top: 70px;
        display: flex;
        justify-content: center;
    }

    .main__secondPart__img img {
        width: 100%;
        height: auto;
    }

    footer {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        text-align: center;
        margin-top: 20px;
        bottom: 0;
        background-color: #164738;
        width: 100%;
        color: #e6e2dd;
        padding: 5px;
    }

    footer a {
        color: #e6e2dd;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }

    footer img {
        width: 150px;
    }

    @media (width < 1230px) {
        .nav__image__logo {
            display: none;
        }

        .nav__form {
            width: 70%;
        }

        .aside__nav__secondary {
            width: 100%;
            background-color: #164738;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .secondary__bar__nav ul {
            display: flex;
            flex-direction: row;
            padding: 10px;
            height: 50px;
        }

        .secondary__bar__nav ul li {
            padding: 0 10px 0 10px;
            color: #e6e2dd;
        }

        .secondary__bar__nav ul li a {
            color: #e6e2dd;
        }

        .main__wrapper {
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .main {
            flex-direction: column;
            align-items: center;
            min-height: 100dvh;
        }


        .main__secondPart__img {
            margin-top: 0;
        }
    }

    @media (width < 750px) {
        .container-md {
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container-md__container__imgUniversity {
            margin-right: 0;
        }

        .main__secondPart__img {
            width: min(inherit, 100%);
            height: auto;
        }
    }
</style>

<body>
    <header class="header">
        <nav class="header__nav">
            <div class="nav__image__logo">
                <img src="./../image/green__eyu__logo.png" alt="">
            </div>
            <form class="nav__form " action="">
                <input type="text" placeholder="Search...">
                <div class="nav__form__button">
                    <input type="submit" value="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </form>
            <button class="header__nav__profile">
                <i class="gg-profile"></i>
            </button>
        </nav>
    </header>

    <div class="overlay" id="overlay"></div>

    <div class="menu" id="menu">
        <div class="menu-header">
            <span class="close-btn" id="close-btn"><i class="fa-solid fa-xmark"></i></span>
            <!-- <span class="close-btn" id="close-btn">&times;</span> -->
            <i class="gg-profile"></i>
        </div>
        <div class="info__user">
            <span class="info__username">
                <?php /* echo $username; */ ?>
            </span>
            <span class="info__email">
                <?php echo $email; ?>
            </span>
        </div>

        <form id="profile-form" class="menu__content" method="post" action="./home.php">
            <div class="menu__content__inputs">
                <label class="menu__item__label" for="alias">Alias</label>
                <input id="alias" class="menu__item__input" type="text" placeholder="Bokidelgado" name="alias" value="<?php echo $username; ?>">
            </div>
            <div class="menu__content__inputs">
                <label class="menu__item__label" for="password">Contraseña</label>
                <input id="password" class="menu__item__input" type="password" placeholder="Bokidelgado" name="password" value="<?php echo $contraseña; ?>">
            </div>
            <div class="menu__content__inputs">
                <label class="menu__item__label" for="name">Nombre</label>
                <input id="name" class="menu__item__input" type="text" placeholder="Bokidelgado" name="name" value="<?php echo $nombre; ?>">
            </div>
            <div class="menu__content__inputs">
                <label class="menu__item__label" for="description">Descripción</label>
                <textarea id="description" style="resize: none; scrollbar-width: thin;" class="menu__item__input" name="description" cols="30" rows="3"><?php echo $descripcion; ?> </textarea>
            </div>
            <div class="menu__content__btns">
                <input class="btn__update" type="submit" value="Actualizar" name="btnUpdate">
                <input class="btn__delete" type="submit" value="Eliminar" name="btnDelete">
                <!-- <button type="button" id="updateProfile" class="btn__update" name="btnUpdate">Actualizar</button>
            <button type="button" id="deleteAccount" class="btn__delete" name="btnDelete">Eliminar</button> -->
            </div>
            <div class="menu__content__img">
                <a class="icon__closeSesion" href="./../php/logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
                <img src="./../image/IMGPROFILE (1).png" alt="">
            </div>
        </form>

    </div>

    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./../Admin/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./../Admin/catalogue.php"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <li><a href="./../Admin/comentarios.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                </ul>
            </nav>
        </aside>
        <main class="main">

            <style>
                .container-md {
                    background-color: #e4dfa9;
                    margin-top: 20px;
                    border-radius: 15px;
                    padding: 10px;
                }

                h2 {
                    font-family: 'OMEGLE', sans-serif;
                    color: #164738;
                }
            </style>

            <div class="main__firstPart">
                <h1>Agregar Universidad</h1>

                <!-- Formulario Completo -->
                <form id="formUniversidad" action="./../php/addUni.php" method="post" enctype="multipart/form-data">
                    <!-- Información General -->
                    <div id="container1" class="container-md mb-4">
                        <h2>Información general</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" name="nombre" placeholder="Universidad Tecnológica..." aria-label="Nombre" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripción</span>
                            <textarea class="form-control" name="descripcion" aria-label="With textarea" placeholder="La universidad se caracteriza por contar con..."></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                            <select class="form-select" id="inputGroupSelect01" name="tipo">
                                <option selected>Choose...</option>
                                <option value="1">Pública</option>
                                <option value="2">Privada</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">URL</span>
                            <input type="text" class="form-control" name="url" placeholder="https://utcancun.com.mx" aria-label="URL" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Correo</span>
                            <input type="text" class="form-control" name="correo" placeholder="utcancun@ut.edu.mx" aria-label="Correo" aria-describedby="basic-addon1">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Imagen Universidad</label>
                            <input class="form-control" type="file" id="formFile" name="imagen">
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="container-md mb-4">
                        <h2>Dirección</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Smza</span>
                            <input type="text" class="form-control" name="smza" placeholder="259" aria-label="Smza" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Mza</span>
                            <input type="text" class="form-control" name="mza" placeholder="35" aria-label="Mza" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Calle</span>
                            <input type="text" class="form-control" name="calle" placeholder="Av. Colosio..." aria-label="Calle" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Lote</span>
                            <input type="text" class="form-control" name="lote" placeholder="2" aria-label="Lote" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">C.P.</span>
                            <input type="text" class="form-control" name="cp" placeholder="77539" aria-label="CP" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <!-- Carreras -->
                    <div class="container-md">
                        <h2>Formulario de Carreras</h2>
                        <div class="mb-3">
                            <label for="carrera" class="form-label">Nueva Carrera</label>
                            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Introduce una carrera">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Descripción</span>
                                <textarea class="form-control" name="descripcion" aria-label="With textarea" placeholder="La universidad se caracteriza por contar con..."></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="agregarCarrera()">Agregar Carrera</button>
                        <input type="hidden" id="carreras" name="carreras">
                        <button type="submit" class="btn btn-success mt-3">Enviar Universidad</button>
                        <h3 id="tituloCarreras" class="mt-4" style="display: none;">Carreras Agregadas:</h3>
                        <ul id="listaCarreras" class="list-group mt-2"></ul>
                    </div>
                </form>


                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
                <script>
                    function agregarCarrera() {
                        const inputCarrera = document.getElementById('carrera');
                        const carrera = inputCarrera.value.trim();
                        const listaCarreras = document.getElementById('listaCarreras');
                        const tituloCarreras = document.getElementById('tituloCarreras');
                        const carrerasInput = document.getElementById('carreras');

                        if (carrera !== '') {
                            // Crear un nuevo elemento de lista
                            const nuevoElemento = document.createElement('li');
                            nuevoElemento.className = 'list-group-item d-flex justify-content-between align-items-center';
                            nuevoElemento.textContent = carrera;

                            // Crear un botón de eliminación
                            const botonEliminar = document.createElement('button');
                            botonEliminar.className = 'btn btn-danger btn-sm';
                            botonEliminar.textContent = 'Eliminar';
                            botonEliminar.onclick = function() {
                                eliminarCarrera(nuevoElemento);
                            };

                            // Agregar el botón al nuevo elemento de lista
                            nuevoElemento.appendChild(botonEliminar);

                            // Agregar el nuevo elemento a la lista
                            listaCarreras.appendChild(nuevoElemento);

                            // Mostrar el título si es necesario
                            if (listaCarreras.children.length > 0) {
                                tituloCarreras.style.display = 'block';
                            }

                            // Actualizar el campo oculto con las carreras
                            actualizarCampoOculto();

                            // Limpiar el campo de entrada
                            inputCarrera.value = '';
                        } else {
                            alert('Por favor, introduce una carrera.');
                        }
                    }

                    function eliminarCarrera(elemento) {
                        const listaCarreras = document.getElementById('listaCarreras');
                        listaCarreras.removeChild(elemento);

                        // Ocultar el título si no hay más carreras
                        if (listaCarreras.children.length === 0) {
                            document.getElementById('tituloCarreras').style.display = 'none';
                        }

                        // Actualizar el campo oculto con las carreras
                        actualizarCampoOculto();
                    }

                    function actualizarCampoOculto() {
                        const listaCarreras = document.getElementById('listaCarreras');
                        const carrerasArray = Array.from(listaCarreras.children).map(item => item.textContent.replace('Eliminar', '').trim());
                        document.getElementById('carreras').value = JSON.stringify(carrerasArray);
                    }
                </script>
            </div>

            <div class="main__secondPart__img">
                <img src="./../image/FOX ranking.JPG" alt="Fox Ranking">
            </div>
        </main>
    </div>
    <footer class="footer">
        <div class="footer__logo">
            <img src="./../image/eyu logo.png" alt="">
        </div>
        <div class="container__sections">
            <a href="">Conocenos</a>
            <a href="">Instagram</a>
            <a href="">Contacto</a>
        </div>
        <p class="footer__p">Benito Juarez. Cancún, Quintana Roo. México ESP/MEX</p>
        <p class="footer__p">Copyright © EYU Explore Your University 2024</p>
    </footer>

    <script>
        const profileButton = document.querySelector('.header__nav__profile');
        const menu = document.getElementById('menu');
        const overlay = document.getElementById('overlay');
        const closeBtn = document.getElementById('close-btn');

        profileButton.addEventListener('click', function() {
            menu.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        closeBtn.addEventListener('click', function() {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        });

        overlay.addEventListener('click', function() {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('formUniversidad');

            form.addEventListener('submit', (event) => {
                let isValid = true;
                let errorMessage = '';

                // Obtener los valores de los campos
                const nombre = document.querySelector('input[name="nombre"]').value.trim();
                const descripcion = document.querySelector('textarea[name="descripcion"]').value.trim();
                const tipo = document.querySelector('select[name="tipo"]').value;
                const url = document.querySelector('input[name="url"]').value.trim();
                const correo = document.querySelector('input[name="correo"]').value.trim();
                const smza = document.querySelector('input[name="smza"]').value.trim();
                const mza = document.querySelector('input[name="mza"]').value.trim();
                const calle = document.querySelector('input[name="calle"]').value.trim();
                const lote = document.querySelector('input[name="lote"]').value.trim();
                const cp = document.querySelector('input[name="cp"]').value.trim();
                const imagen = document.querySelector('input[name="imagen"]').files.length;

                // Validar campos
                if (!nombre) {
                    errorMessage += 'El nombre es obligatorio.\n';
                    isValid = false;
                }
                if (!descripcion) {
                    errorMessage += 'La descripción es obligatoria.\n';
                    isValid = false;
                }
                if (!tipo) {
                    errorMessage += 'El tipo de universidad es obligatorio.\n';
                    isValid = false;
                }
                if (!isValidURL(url)) {
                    errorMessage += 'La URL no es válida.\n';
                    isValid = false;
                }
                if (!isValidEmail(correo)) {
                    errorMessage += 'El correo electrónico no es válido.\n';
                    isValid = false;
                }
                if (!smza) {
                    errorMessage += 'El Smza es obligatorio.\n';
                    isValid = false;
                }
                if (!mza) {
                    errorMessage += 'El Mza es obligatorio.\n';
                    isValid = false;
                }
                if (!calle) {
                    errorMessage += 'La calle es obligatoria.\n';
                    isValid = false;
                }
                if (!lote) {
                    errorMessage += 'El lote es obligatorio.\n';
                    isValid = false;
                }
                if (!cp || !/^\d{5}$/.test(cp)) {
                    errorMessage += 'El C.P. es obligatorio y debe ser un código postal válido (5 dígitos).\n';
                    isValid = false;
                }
                if (imagen === 0) {
                    errorMessage += 'La imagen de la universidad es obligatoria.\n';
                    isValid = false;
                }

                if (!isValid) {
                    alert(errorMessage);
                    event.preventDefault(); // Evita el envío del formulario
                }
            });

            function isValidURL(url) {
                try {
                    new URL(url);
                    return true;
                } catch (_) {
                    return false;
                }
            }

            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            window.agregarCarrera = function() {
                const inputCarrera = document.getElementById('carrera');
                const carrera = inputCarrera.value.trim();
                const listaCarreras = document.getElementById('listaCarreras');
                const tituloCarreras = document.getElementById('tituloCarreras');
                const carrerasInput = document.getElementById('carreras');

                if (carrera) {
                    const nuevoElemento = document.createElement('li');
                    nuevoElemento.className = 'list-group-item d-flex justify-content-between align-items-center';
                    nuevoElemento.textContent = carrera;

                    const botonEliminar = document.createElement('button');
                    botonEliminar.className = 'btn btn-danger btn-sm';
                    botonEliminar.textContent = 'Eliminar';
                    botonEliminar.onclick = () => {
                        nuevoElemento.remove();
                        actualizarCarreras();
                    };

                    nuevoElemento.appendChild(botonEliminar);
                    listaCarreras.appendChild(nuevoElemento);

                    // Mostrar el título si hay carreras
                    tituloCarreras.style.display = 'block';

                    // Limpiar el campo de entrada
                    inputCarrera.value = '';
                    actualizarCarreras();
                }
            };

            function actualizarCarreras() {
                const carreras = Array.from(document.querySelectorAll('#listaCarreras li')).map(li => li.textContent.replace('Eliminar', '').trim());
                document.getElementById('carreras').value = JSON.stringify(carreras);
            }
        });
    </script>
</body>

</html>