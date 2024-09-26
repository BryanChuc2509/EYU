<?php
session_start();


// Verificar si la variable de sesión está establecida
if (!isset($_SESSION['Nombre_de_Usuario'])) {
    header('Location: ./../HTML/login.php');
    exit();
}
include("./../php/headerProfile.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/000b2652fd.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
    <link rel="stylesheet" href="./../CSS/test.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            const cardsTitle = document.querySelectorAll('.card-title');
            cards.forEach((card, index) => {
                if (index % 2 === 0) {
                    card.classList.add('bg-verde');
                    card.style.color = '#fff';

                } else {
                    card.classList.add('bg-arena');
                }
            });

            cardsTitle.forEach((card, index) => {
                if (!(index % 2 === 0)) {
                    card.style.color = '#000'
                }
            });

            // new Splide('#card-carousel', {
            //     type: 'loop',
            //     perPage: 3,
            //     breakpoints: {
            //         800: {
            //             perPage: 1,
            //         },
            //     },
            // }).mount();
        });
    </script>


    <style>
        .card {
            margin: 10px 5px 50px 5px;
            /* height: min(400px); */
            padding: 20px;
            border-radius: 30px;

            h5 {
                color: #fff;
                font-family: 'OMEGLE', sans-serif;
                font-weight: 100;
                font-size: 2.4em;
                text-align: center;
            }
        }

        .bg-verde {
            background-color: #789477;
        }

        .bg-arena {
            background-color: #e4dfa9;
        }


        .card-body {
            display: flex;
            flex-direction: column;
            transition: transform .5s;
            margin-bottom: 50px;

        }

        .card:hover {
            transform: scale(1.02);
            transition: transform .5s;
            border-radius: 30px;
        }

        .ellipsis {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 8;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5em;
            /* Ajusta esto según la altura de la línea de tu texto */
            max-height: 15em;
            /* 10 líneas * 1.5em altura de línea */
        }


        .btn {
            margin-top: 5px;
            background-color: #DA750F;
            min-width: 200px;
            border-radius: 30px;
            color: #fff;
            border: none;
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

        /* Estilo para los dots */
        .splide__pagination {
            text-align: center;
        }

        .splide__pagination__page {
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .splide__pagination__page.is-active {
            background-color: #333;
        }

        @media (width < 1000px) {
            .card {
                margin: 20px auto;
                margin-bottom: 30px;
            }

            .contenedor {
                width: min(400px, 100%);
            }

            .splide__arrow--prev {
                left: -50px;
            }

            .splide__arrow--next {
                right: -50px;
            }
        }

        @media (width < 500px) {
            .card {
                margin-bottom: 30px;
                padding: 30px;
            }

            .contenedor {
                width: min(400px, 100%);
            }

            .splide__arrow--prev {
                left: 10px;
            }

            .splide__arrow--next {
                right: 10px;
            }
        }
    </style>
</head>

<body>

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
        <main class="main ">
            <div class="main__infoSuperior">
                <h1>¿Aún no tienes idea sobre tu futuro? EYU te asiste</h1>
                <p class="main__infoSuperior__p">Recuerdan que estos test y herramientas son solo una guía y no
                    necesariamente te darán una respuesta definitiva sobre que estudiar. Es importante conseiderar tus
                    propios intereses, valores, habilidades y circunstancias personales al tomar una decisión sobre tu
                    educación y carrera profesional Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, itaque veritatis mollitia modi cumque, ex porro quasi tenetur beatae, omnis iusto sit fugiat exercitationem quis dolorum provident nobis labore optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, nemo fuga ducimus molestias sapiente nulla magni, dicta, quam illum modi excepturi nostrum sed rerum aliquam! Quia earum minus quas a.</p>
                <div class="main__infoSuperior__fox">
                    <img src="./../image/Fox ranking.JPG" alt="">
                </div>
            </div>
            <div class="contenedor">
                <section id="card-carousel" class="splide container" aria-label="Beautiful Images">
                <div class="splide__track" style="width: 100%;">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Test de Intereses Profesionales</h5>
                                        <p class="card-text ellipsis">Este test mide tus intereses en diferentes
                                            áreas profesionales y compara tus respuestas con las de personas que
                                            están satisfechas en sus carreras. Te ayuda a identificar áreas de
                                            interés y sugerir campos de estudio o carreras que pueden ser adecuadas
                                            para ti . ✨🦊
                                        </p>
                                        <a target="_blank" href="https://forms.gle/nZUfP7Yry16GErWE8" class="btn btn-warning mx-auto">Presentar</a>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Test de Aptitudes</h5>
                                        <p class="card-text ellipsis">Este tipo de test evalúa tus habilidades en
                                            diversas áreas como matemáticas, lenguaje, razonamiento espacial y lógico.

                                            Basándose en tus resultados, te sugiere carreras que podrían aprovechar
                                            mejor tus habilidades naturales. 🌱😮
                                        

                                        </p>
                                        <a target="_blank" href="https://forms.gle/rc8YvNSkBdJ9CDNC8" class="btn btn-warning  mx-auto">Presentar</a>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Test de Personalidad</h5>
                                        <p class="card-text ">El MBTI es una herramienta que clasifica
                                            tu personalidad en 16 tipos diferentes, basándose en cuatro dimensiones:
                                            extroversión/introversión, sensación/intuición, pensamiento/sentimiento,
                                            y juicio/percepción. La combinación de estas dimensiones puede darte una
                                            idea de qué tipo de ambiente de trabajo y roles podrían ser más adecuados
                                            para ti. 🐳✨</p>
                                        <a target="_blank" href="https://forms.gle/zN3DrtyRv2u6whhMA" class="btn btn-warning mx-auto">Presentar</a>
                                    </div>
                                </div>
                            </li>
                            <!-- Add more slides as needed -->
                        </ul>
                    </div>
                </section>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    new Splide('#card-carousel', {
                        type: 'loop',
                        perPage: 3,
                        breakpoints: {
                            1000: {
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