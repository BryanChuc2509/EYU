<?php
require 'conexion_bd.php'; // Asegúrate de que este archivo esté en el mismo directorio

// Instanciar la clase de conexión
$conexion = new conexion();

// Consulta SQL
$sql = "SELECT ID_Universidad, Nombre FROM universidades";

// Obtener los resultados
$resultado = $conexion->consultar($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Universidades</title>
    <style>
        .results-container {
            display: none;
            /* Ocultar la lista inicialmente */
            position: absolute;
            background: white;
            width: 100%;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }

        .results-container.show {
            display: block;
            /* Mostrar la lista cuando sea necesario */
        }

        .result-item {
            padding: 10px;
            cursor: pointer;
        }

        .result-item:hover {
            background-color: #f0f0f0;
        }

        .hidden {
            display: none;
        }

        .no-results {
            padding: 10px;
            color: #888;
            text-align: center;
        }
    </style>
</head>

<body>
    <form class="nav__form" id="search-form" onsubmit="return false;">
        <input type="text" id="search-input" placeholder="Buscar universidad..." autocomplete="off">
        <div class="nav__form__button">
            <input type="submit" value="">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div id="results-container" class="results-container">
            <?php
            // Generar la lista de universidades
            foreach ($resultado as $fila) {
                echo '<div class="result-item" data-id="' . htmlspecialchars($fila["ID_Universidad"]) . '">';
                echo '    <a href="profileUni.php?id=' . htmlspecialchars($fila["ID_Universidad"]) . '">';
                echo '        ' . htmlspecialchars($fila["Nombre"]);
                echo '    </a>';
                echo '</div>';
            }
            ?>
            <div class="no-results hidden">No hay resultados</div>
        </div>
    </form>

    <script>
        // Función para eliminar acentos y normalizar cadenas
        function normalizeString(str) {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        }

        const searchInput = document.getElementById('search-input');
        const resultsContainer = document.getElementById('results-container');
        const items = document.querySelectorAll('.result-item');
        const noResultsMessage = document.querySelector('.no-results');

        searchInput.addEventListener('keyup', e => {
            const searchTerm = e.target.value.trim();
            const normalizedSearchTerm = normalizeString(searchTerm).toLowerCase();

            let anyMatch = false;
            items.forEach(universidad => {
                const itemText = normalizeString(universidad.textContent).toLowerCase();

                // Verificar si el término de búsqueda está incluido en el texto del elemento
                const matches = normalizedSearchTerm.split(/\s+/).every(term => itemText.includes(term));

                universidad.classList.toggle('hidden', !matches);

                if (matches) {
                    anyMatch = true;
                }
            });

            // Mostrar u ocultar el mensaje de "No hay resultados"
            noResultsMessage.classList.toggle('hidden', anyMatch);

            // Mostrar la lista cuando se comienza a escribir y hay coincidencias
            if (searchTerm.length > 0) {
                resultsContainer.classList.add('show');
            } else {
                resultsContainer.classList.remove('show');
            }
        });

        document.getElementById('search-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const searchTerm = normalizeString(document.getElementById('search-input').value.trim()).toLowerCase();
            let closestMatch = null;

            // Encontrar el primer elemento que coincida
            items.forEach(universidad => {
                const itemText = normalizeString(universidad.textContent).toLowerCase();

                if (itemText.includes(searchTerm) && !closestMatch) {
                    closestMatch = universidad;
                }
            });

            if (closestMatch) {
                const id = closestMatch.getAttribute('data-id');
                window.location.href = `./../HTML/profileUni.php?id=${id}`;
            } else {
                alert('No hay coincidencias');
            }
        });

        document.addEventListener('click', function (e) {
            if (!document.getElementById('search-form').contains(e.target)) {
                resultsContainer.classList.remove('show');
            }
        });

        searchInput.addEventListener('focus', function () {
            if (searchInput.value.trim().length > 0) {
                resultsContainer.classList.add('show');
            }
        });
    </script>
</body>

</html>
