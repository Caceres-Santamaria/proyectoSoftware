<!DOCTYPE html>
<?PHP
session_start();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/estilos/normalize.css">
    <link rel="stylesheet" href="../static/estilos/glider.min.css">
    <link rel="stylesheet" href="../static/estilos/home.css">
    <title>Home</title>
    <script src="../static/validaciones/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cd1bad9cef.js" crossorigin="anonymous"></script>
    <script src="../static/validaciones/glider.min.js"></script>
    <script src="../static/validaciones/app.js"></script>
</head>

<body>
    <div class="contenedor">
        <div class="row justify-content-md-center">
            <?php
            include '../componentes/menuA.php';
            ?>
        </div>
        <div class="carousel">
            <div class="carousel__contenedor">
                <div class="carousel__lista">
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider6.jpg" alt="Empire State Building">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider7.jpg" alt="Harmony Tower">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider8.jpg" alt="Empire State Building">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider1.jpg" alt="Harmony Tower">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider5.jpg" alt="Harmony Tower">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider2.jpg" alt="Rock and Roll Hall of Fame">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider3.jpg" alt="Constitution Square - Tower I">
                    </div>
                    <div class="carousel__elemento">
                        <img src="../static/imagenes/slider4.jpg" alt="Empire State Building">
                    </div>
                </div>
                <button aria-label="Prvious" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button aria-label="Next" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <div role="tablist" class="carousel__indicadores"></div>
            </div>
        </div>
        <main class="content">
            <div class="containerOverlay">
                <div class="imgcat">
                    <img src="../static/imagenes/mapa.png" alt="">
                    <a href="cupon.php">
                        <div class="overlay">
                            <div class="text">
                                <p>Cupones</p>
                            </div>
                        </div><!-- overlay -->
                    </a>
                </div>
            </div>
            <div class="containerOverlay">
                <div class="imgcat">
                    <img src="../static/imagenes/modificarI.png" alt="">
                    <a href="modificarProducto.php">
                        <div class="overlay">
                            <div class="text">
                                <p>Modificar productos</p>
                            </div>
                        </div><!-- overlay -->
                    </a>
                </div>
            </div>
            <div class="containerOverlay">
                <div class="imgcat">
                    <img src="../static/imagenes/carrito.png" alt="">
                    <a href="pedidos.php">
                        <div class="overlay">
                            <div class="text">
                                <p>Pedidos</p>
                            </div>
                        </div><!-- overlay -->
                    </a>
                </div>
            </div>
        </main>
        <br /><br /><br />
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
</body>

</html>