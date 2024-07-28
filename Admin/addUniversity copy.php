<?php
session_start();

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

                <form id="formUniversidad" action="./../php/addUni.php" method="post" enctype="multipart/form-data">
                    <!-- Información General -->
                    <!-- Información General -->
                    <div id="container1" class="container-md mb-4">
                        <h2>Información general</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Universidad Tecnológica..." aria-label="Nombre" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripción</span>
                            <textarea class="form-control" id="descripcionUniversidad" name="descripcionUniversidad" aria-label="With textarea" placeholder="La universidad se caracteriza por contar con..." required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                            <select class="form-select" id="inputGroupSelect01" name="tipo" required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="publica">Pública</option>
                                <option value="privada">Privada</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">URL</span>
                            <input type="url" class="form-control" id="url" name="url" placeholder="https://utcancun.com.mx" aria-label="URL" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Número telefónico</span>
                            <input type="tel" class="form-control" id="numero" name="numero" placeholder="9988778877" aria-label="Número telefónico" aria-describedby="basic-addon1" pattern="[0-9]{10}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Imagen Universidad</label>
                            <input class="form-control" type="file" id="formFile" name="imagen" accept="image/*" required>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="container-md mb-4">
                        <h2>Dirección</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Smza</span>
                            <input type="text" class="form-control" id="smza" name="smza" placeholder="259" aria-label="Smza" aria-describedby="basic-addon1" pattern="[0-9]+" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Mza</span>
                            <input type="text" class="form-control" id="mza" name="mza" placeholder="35" aria-label="Mza" aria-describedby="basic-addon1" pattern="[0-9]+" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Calle</span>
                            <input type="text" class="form-control" id="calle" name="calle" placeholder="Av. Colosio..." aria-label="Calle" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Lote</span>
                            <input type="text" class="form-control" id="lote" name="lote" placeholder="2" aria-label="Lote" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">C.P.</span>
                            <input type="text" class="form-control" id="cp" name="cp" placeholder="77539" aria-label="CP" aria-describedby="basic-addon1" pattern="[0-9]{5}" required>
                        </div>
                    </div>

                    <!-- Carreras -->
                    <div class="container-md">
                        <h2>Carreras</h2>
                        <div class="mb-3">
                            <label for="carrera" class="form-label mb-3">Nueva Carrera</label>
                            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Introduce una carrera">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Descripción</span>
                                <textarea class="form-control" id="descripcionCarrera" name="descripcionCarrera" aria-label="With textarea" placeholder="La carrera se caracteriza por..."></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="agregarCarrera()">Agregar
                            Carrera</button>
                        <input type="hidden" id="carreras" name="carreras">
                        <button type="submit" class="btn btn-success mt-3">Enviar Universidad</button>
                        <h3 id="tituloCarreras" class="mt-4" style="display: none;">Carreras Agregadas:</h3>
                        <ul id="listaCarreras" class="list-group mt-2"></ul>
                    </div>
                </form>


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
                                    <p>${carrera.descripcion}</p>
                                </details>
                            `;
                                listaCarreras.appendChild(li);
                            });

                            document.getElementById('tituloCarreras').style.display = carreras.length > 0 ? 'block' : 'none';
                        }

                        window.agregarCarrera = function() {
                            const nombre = document.getElementById('carrera').value.trim();
                            const descripcion = document.getElementById('descripcionCarrera').value.trim();

                            // Validar campos de carrera
                            if (!nombre) {
                                alert('Por favor, ingresa el nombre de la carrera.');
                                return;
                            }
                            if (!descripcion) {
                                alert('Por favor, ingresa una descripción para la carrera.');
                                return;
                            }

                            // Agregar carrera y limpiar campos
                            carreras.push({
                                nombre,
                                descripcion
                            });
                            actualizarListaCarreras();
                            document.getElementById('carrera').value = '';
                            document.getElementById('descripcionCarrera').value = '';
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
                            if (!nombre || !descripcionUniversidad || !tipo || !url || !numero || !imagen || !smza || !mza || !calle || !lote || !cp) {
                                alert('Por favor, completa todos los campos del formulario.');
                                event.preventDefault(); // Prevenir el envío del formulario si hay errores
                                return;
                            }

                            // Validar si se ha agregado al menos una carrera
                            if (carreras.length === 0) {
                                alert('Por favor, agrega al menos una carrera.');
                                event.preventDefault(); // Prevenir el envío del formulario si no hay carreras
                            }
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