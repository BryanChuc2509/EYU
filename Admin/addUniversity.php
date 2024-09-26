<?php
session_start();

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}
if ($_SESSION['privilegio'] != 'administrador') {
    header('Location: ./../HTML/home.php');
    exit();
}


?>
<!-- Inslusión del header -->
<?php
include("./../php/headerProfile.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir universidades</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./../CSS/addUniversity.css">
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

            <div class="main__firstPart">
                <h1>Agregar Universidad</h1>

                <form id="formUniversidad" action="./../php/addUni.php" method="post" enctype="multipart/form-data">
                    <!-- Información General -->
                    <div id="container1" class="container-md mb-4">
                        <h2>Información General</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Universidad Tecnológica..." aria-label="Nombre" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripción</span>
                            <textarea class="form-control" id="descripcionUniversidad" name="descripcionUniversidad" aria-label="Descripción" placeholder="La universidad se caracteriza por contar con..."></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                            <select class="form-select" id="inputGroupSelect01" name="tipo">
                                <option selected disabled>Selecciona...</option>
                                <option value="publica">Pública</option>
                                <option value="privada">Privada</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">URL</span>
                            <input type="text" class="form-control" id="url" name="url" placeholder="https://utcancun.com.mx" aria-label="URL" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Número Telefónico</span>
                            <input type="tel" class="form-control" id="numero" name="numero" placeholder="998 123 4567" aria-label="Número Telefónico" aria-describedby="basic-addon1">
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
                            <input type="text" class="form-control" id="smza" name="smza" placeholder="259" aria-label="Smza" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Mza</span>
                            <input type="text" class="form-control" id="mza" name="mza" placeholder="35" aria-label="Mza" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Calle</span>
                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Av. Colosio..." aria-label="Calle" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Lote</span>
                            <input type="text" class="form-control" id="lote" name="lote" placeholder="2" aria-label="Lote" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">C.P.</span>
                            <input type="text" class="form-control" id="cp" name="cp" placeholder="77539" aria-label="CP" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <!-- Carreras -->
                    <div class="container-md">
                        <h2>Formulario de Carreras</h2>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="carrera" class="form-label input-group-text">Nueva Carrera</label>
                                <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Introduce una carrera">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Descripción</span>
                                <textarea class="form-control" id="descripcionCarrera" name="descripcionCarrera" aria-label="Descripción" placeholder="La carrera se caracteriza por..."></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Duración</span>
                                <input type="text" class="form-control" id="duracionCarrera" name="duracionCarrera" placeholder="2 años" aria-label="Duración">
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
                    document.addEventListener('DOMContentLoaded', (event) => {
                        let carreras = [];

                        function actualizarListaCarreras() {
                            const listaCarreras = document.getElementById('listaCarreras');
                            listaCarreras.innerHTML = '';
                            carreras.forEach((carrera, index) => {
                                const li = document.createElement('li');
                                li.className = 'list-group-item';
                                li.innerHTML = `
                    <details>
                        <summary class="d-flex justify-content-between align-items-center">
                            ${carrera.nombre}
                            <button class="btn btn-danger btn-sm" onclick="eliminarCarrera(${index})">Eliminar</button>
                        </summary>
                        <p><strong>Descripción:</strong>${carrera.descripcion}</p>
                        <p><strong>Duración:</strong> ${carrera.duracion}</p>
                    </details>
                `;
                                listaCarreras.appendChild(li);
                            });

                            document.getElementById('tituloCarreras').style.display = carreras.length > 0 ? 'block' : 'none';
                        }

                        window.agregarCarrera = function() {
                            const nombre = document.getElementById('carrera').value.trim();
                            const descripcion = document.getElementById('descripcionCarrera').value.trim();
                            const duracion = document.getElementById('duracionCarrera').value.trim();

                            // Validar campos de carrera
                            if (!nombre) {
                                alert('Por favor, ingresa el nombre de la carrera.');
                                document.getElementById('carrera').focus();
                                return;
                            }
                            if (!descripcion) {
                                alert('Por favor, ingresa una descripción para la carrera.');
                                document.getElementById('descripcionCarrera').focus();
                                return;
                            }
                            if (!duracion) {
                                alert('Por favor, ingresa la duración de la carrera.');
                                document.getElementById('duracionCarrera').focus();
                                return;
                            }

                            // Agregar carrera y limpiar campos
                            carreras.push({
                                nombre,
                                descripcion,
                                duracion
                            });
                            actualizarListaCarreras();
                            document.getElementById('carrera').value = '';
                            document.getElementById('descripcionCarrera').value = '';
                            document.getElementById('duracionCarrera').value = '';
                        };

                        window.eliminarCarrera = function(index) {
                            if (confirm(`¿Estás seguro de que quieres eliminar la carrera "${carreras[index].nombre}"?`)) {
                                carreras.splice(index, 1);
                                actualizarListaCarreras();
                            }
                        };

                        document.getElementById('formUniversidad').addEventListener('submit', function(event) {
                            const nombre = document.getElementById('nombre').value.trim();
                            const descripcionUniversidad = document.getElementById('descripcionUniversidad').value.trim();
                            const tipo = document.getElementById('inputGroupSelect01').value;
                            const url = document.getElementById('url').value.trim();
                            const numero = document.getElementById('numero').value.trim();
                            const imagen = document.getElementById('formFile').files.length > 0;
                            const smza = document.getElementById('smza').value.trim();
                            const mza = document.getElementById('mza').value.trim();
                            const calle = document.getElementById('calle').value.trim();
                            const lote = document.getElementById('lote').value.trim();
                            const cp = document.getElementById('cp').value.trim();

                            // Validar campos del formulario
                            if (!nombre) {
                                alert('Por favor, completa el nombre de la universidad.');
                                document.getElementById('nombre').focus();
                                event.preventDefault(); // Prevenir el envío del formulario si hay errores
                                return;
                            }
                            if (!descripcionUniversidad) {
                                alert('Por favor, completa la descripción de la universidad.');
                                document.getElementById('descripcionUniversidad').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!tipo) {
                                alert('Por favor, selecciona el tipo de universidad.');
                                document.getElementById('inputGroupSelect01').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!url) {
                                alert('Por favor, ingresa la URL de la universidad.');
                                document.getElementById('url').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!numero) {
                                alert('Por favor, ingresa el número telefónico de la universidad.');
                                document.getElementById('numero').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!imagen) {
                                alert('Por favor, sube una imagen de la universidad.');
                                document.getElementById('formFile').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!smza) {
                                alert('Por favor, completa el campo Smza.');
                                document.getElementById('smza').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!mza) {
                                alert('Por favor, completa el campo Mza.');
                                document.getElementById('mza').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!calle) {
                                alert('Por favor, completa el campo Calle.');
                                document.getElementById('calle').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!lote) {
                                alert('Por favor, completa el campo Lote.');
                                document.getElementById('lote').focus();
                                event.preventDefault();
                                return;
                            }
                            if (!cp) {
                                alert('Por favor, completa el campo C.P.');
                                document.getElementById('cp').focus();
                                event.preventDefault();
                                return;
                            }

                            // Validar si se ha agregado al menos una carrera
                            if (carreras.length === 0) {
                                alert('Por favor, agrega al menos una carrera.');
                                document.getElementById('carrera').focus();
                                event.preventDefault(); // Prevenir el envío del formulario si no hay carreras
                                return;
                            }

                            // Convertir carreras a formato JSON y guardarlas en un campo oculto
                            document.getElementById('carreras').value = JSON.stringify(carreras);
                        });
                    });
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

</body>

</html>