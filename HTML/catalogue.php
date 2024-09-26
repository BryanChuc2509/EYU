<?php
session_start();

// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}

include("./../php/headerProfile.php");
class conexion2
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "root";
    public $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=eyu", $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "falla de conexión" . $e;
        }
    }

    public function ejecutar($sql)
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertID();
    }

    public function consultar2($sql, $params = [])
    {
        $sentencia = $this->conexion->prepare($sql);
        foreach ($params as $key => $value) {
            $sentencia->bindValue($key, $value);
        }
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function modificar($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        return $sentencia->execute();
    }
}


?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./../CSS/catalogue.css">


    <style>
        .card-body {
            display: flex;
            flex-direction: column;

        }

        .card:hover {
            transform: scale(1.02);
            transition: transform .5s;

        }


        .btn {
            justify-self: center;
            margin-top: 5px;
        }

        .splide__arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .splide__arrow--prev {
            left: -50px;
        }

        .splide__arrow--next {
            right: -50px;
        }
    </style>
</head>

<body>  <?php

$conexion = new conexion2();

// Consulta SQL
$sql = "SELECT ID_Universidad, Nombre FROM universidades";

// Obtener los resultados
$resultado = $conexion->consultar2($sql);
?>





    <div class="main__wrapper">
        <aside class="aside__nav__secondary">
            <nav class="secondary__bar__nav">
                <ul>
                    <li><a href="./../HTML/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li><a href="./../HTML/catalogue.php"><i class="fa-solid fa-table-cells-large"></i></a></li>
                    <!-- <li><a href="./../HTML/ranking.php"><i class="fa-solid fa-trophy"></i></a></li> -->
                    <li><a href="./../HTML/save.php"><i class="fa-solid fa-bookmark"></i></a></li>
                    <li><a href="./../HTML/test.php"><i class="fa-solid fa-paperclip"></i></a></li>
                    <li><a href="./../HTML/faq.php"><i class="fa-regular fa-comment-dots"></i></a></li>
                    <!-- <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></i></a></li> -->
                </ul>
            </nav>
        </aside>
        <main class="main">
        <div class="main__contenedor__items">
    <h1 class="category">Categorías</h1>
    <button type="button" class="main__items" data-filter="publica">Públicas</button>
    <button type="button" class="main__items" data-filter="privada">Privadas</button>
</div>
<div class="container">
    <section id="card-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                $conexion = new conexion2();

                // Inicializar la consulta SQL
                $sql = "SELECT ID_Universidad, Nombre, Descripcion, image FROM universidades";
                $params = [];

                // Filtrar por tipo de universidad si se proporciona
                if (isset($_GET['type']) && in_array($_GET['type'], ['publica', 'privada'])) {
                    $type = $_GET['type'];
                    $sql .= " WHERE Tipo_de_Universidad = :type";
                    $params[':type'] = $type;
                }

                // consultar2 la base de datos
                $resultado = $conexion->consultar2($sql, $params);

                foreach ($resultado as $fila) {
                    echo '<li class="splide__slide">';
                    echo '    <div class="card">';
                    echo '        <img src="' . htmlspecialchars($fila["image"]) . '" class="card-img-top" alt="Logo de ' . htmlspecialchars($fila["Nombre"]) . '">';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="card-title">' . htmlspecialchars($fila["Nombre"]) . '</h5>';
                    $descripcion = strlen($fila["Descripcion"]) > 150 ? substr($fila["Descripcion"], 0, 150) . '...' : $fila["Descripcion"];
                    echo '            <p class="card-text">' . htmlspecialchars($descripcion) . '</p>';
                    echo '            <a href="ProfileUni.php?id=' . htmlspecialchars($fila["ID_Universidad"]) . '" class="btn btn-outline-primary">Ver más</a>';
                    echo '            <a href="./../php/save.php?id=' . htmlspecialchars($fila["ID_Universidad"]) . '" class="btn btn-outline-success">Guardar</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </section>
</div>

<script>
document.querySelectorAll('.main__items').forEach(button => {
    button.addEventListener('click', () => {
        const filter = button.getAttribute('data-filter');
        const url = new URL(window.location.href);
        url.searchParams.set('type', filter);
        window.location.href = url.toString();
    });
});
</script>

            <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    new Splide('#card-carousel', {
                        type: 'loop',
                        perPage: 3,
                        breakpoints: {
                            800: {
                                perPage: 1,
                            },
                        },
                    }).mount();
                });
            </script>
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