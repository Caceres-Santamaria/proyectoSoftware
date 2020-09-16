<!DOCTYPE html>
<?PHP
include "../funciones/Metodos.php";
session_start();
$cod = $_REQUEST['id'];
$objMetodo = new Metodos();
$lista = $objMetodo->ListarProductosCod($cod);
foreach ($lista as $row) {
    $nombre = $row[0];
    $precio = $row[2];
    $imagen = $row[3];
    $descripción = $row[1];
    $imagenes = $row[4];
    $existencia = $row[5];
}
if (!empty($imagenes)) {
    $images = explode(";", $imagenes);
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto</title>
    <link rel="stylesheet" href="../static/estilos/general.css">
    <script src="../static/validaciones/valida.js"></script>
    <script src="../static/validaciones/jquery.min.js"></script>
    <script src="../static/slider/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../static/estilos/normalize.css">
    <link rel="stylesheet" href="../static/estilos/glider.min.css">
    <link rel="stylesheet" href="../static/estilos/home.css">
    <script src="https://kit.fontawesome.com/cd1bad9cef.js" crossorigin="anonymous"></script>
    <script src="../static/validaciones/glider.min.js"></script>
    <script src="../static/validaciones/app.js"></script>
</head>

<body>
    <div class="contenedor">
        <?php
        include '../componentes/menu.php';
        ?>
        <div class="card mb-3 padin-section">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div class="row justify-content-md-center carrusel">
                        <div class="col-sm-12">
                            <div id="carouselExampleIndicators" class="carousel slider" data-ride="carousel">
                                <ol class="carousel-indicators indicador">
                                    <?php
                                    if (!empty($images[0])) {
                                        if (!empty($images[1])) {
                                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
                                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>';
                                            echo '</ol>';
                                            echo '<div class="carousel-inner producto" >';
                                            echo '<div class="carousel-item active" data-interval="10000">';
                                            echo '<img src="../static/imagenes/productos/' . $imagen . '" class="d-block w-100" alt="...">';
                                            echo '</div>';
                                            echo '<div class="carousel-item" data-interval="1000">';
                                            echo '<img src="../static/imagenes/productos/' . $images[0] . '" class="d-block w-100" alt="...">';
                                            echo '</div>';
                                            echo '<div class="carousel-item" data-interval="1000">';
                                            echo '<img src="../static/imagenes/productos/' . $images[1] . '" class="d-block w-100" alt="...">';
                                            echo '</div>';
                                            echo '</div>';
                                        } else {
                                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
                                            echo '</ol>';
                                            echo '<div class="carousel-inner producto" >';
                                            echo '<div class="carousel-item active" data-interval="10000">';
                                            echo '<img src="../static/imagenes/productos/' . $imagen . '" class="d-block w-100" alt="...">';
                                            echo '</div>';
                                            echo '<div class="carousel-item" data-interval="1000">';
                                            echo '<img src="../static/imagenes/productos/' . $images[0] . '" class="d-block w-100" alt="...">';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                                        echo '</ol>';
                                        echo '<div class="carousel-inner producto" >';
                                        echo '<div class="carousel-item active" data-interval="10000">';
                                        echo '<img src="../static/imagenes/productos/' . $imagen . '" class="d-block w-100" alt="...">';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($nombre) ?></h5>
                        <p class="description"><?php echo $descripción; ?></p>
                        <hr>
                        <p class="precioD">Precio: $<?php echo number_format($precio, 0); ?></p>
                        <span id="cantidadC" for="cantidad">Cantidad: </span>
                        <form action="" method="post">
                            <input type="number" min="1" max="<?php echo $existencia; ?>" onblur="maximacantidad(<?php echo $existencia; ?>)" value="1" name="cantidad" id="cantidadB">
                            <input type="hidden" id="codigo" name="codigo" value="<?php echo $cod; ?>">
                            <?php
                            if (isset($_SESSION["usuario"])) {
                                echo '<button type="button" name="btnAction" id="btnAction" value="Agregar" class="btn btn-block boton" onclick="enviarC()" data-dismiss="modal"> Agregar Al Carrito</button>';
                            } else {
                                echo '<button type="button" class="btn btn-block boton" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Agregar Al Carrito</button>';
                            }
                            ?>
                            <div class="form-group collapse" id="collapseExample">
                                <div class="danger">
                                    <small style="color: red;">Inicie sesión primero</small>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <br /><br /><br />
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
</body>

</html>