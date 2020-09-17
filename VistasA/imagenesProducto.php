<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
session_start();
$cons = new Metodos();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes producto</title>
    <link rel="stylesheet" href="../static/estilos/general.css">
    <link rel="stylesheet" href="../static/estilos/normalize.css">
    <link rel="stylesheet" href="../static/estilos/home.css">
    <script src="https://kit.fontawesome.com/cd1bad9cef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/prueba.css" />
    <script src="slider/js/splide.min.js"></script>
    <script src="./prueba.js"></script>
    <link rel="stylesheet" href="slider/css/splide.min.css" />
</head>

<body>
    <div class="contenedor">
        <?php
        include '../componentes/menuA.php';
        ?>
        <section class="padin-section">
            <div class="slider-producto">
                <div class="splide__container">
                    <div id="primary-slider" class="splide p-splide--primary">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod1.JPG" alt="Sample Image 01" />
                                </li>
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod2.JPG" alt="Sample Image 02" />
                                </li>
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod3.JPG" alt="Sample Image 03" />
                                </li>
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod4.JPG" alt="Sample Image 04" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="secondary-slider" class="splide p-splide--secundary">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod1.JPG" alt="Sample Image 01" />
                                </li>
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod2.JPG" alt="Sample Image 02" />
                                </li>
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod3.JPG" alt="Sample Image 03" />
                                </li>
                                <li class="splide__slide p-splide__slide">
                                    <img src="./img/prod4.JPG" alt="Sample Image 04" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
    <script>
        function verifica() {
            var referencia = document.getElementById("referencia").value;
            if (referencia == "") {
                document.getElementById("buscar").disabled = true;
            } else {
                document.getElementById("buscar").disabled = false;
            }
        }

        function recarga() {
            var referencia = document.getElementById("referencia").value;
            location.href = "../VistasA/imagenes.php?referencia=" + referencia;
        }
    </script>
</body>

</html>