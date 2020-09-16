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
    $descripción = $row[1];
}
if (!isset($_SESSION['imagenes'])) {
    $images = array();
    $productos = $objMetodo->getProductos();
    foreach ($productos as $row) {
        $imagenes = $objMetodo->getImagenes($row[0]);
        array_push($images, array(
            'ID' => $row[0],
            'IMAGES' => $imagenes
        ));
    }
    $_SESSION['imagenes'] = $images;
}
$images = $objMetodo->getImagenProducto('' . $cod . '', $_SESSION['imagenes']);
$tallas = $objMetodo->getTallas($cod);
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
                                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                                    echo '</ol>';
                                    echo '<div class="carousel-inner producto" >';
                                    $c=true;
                                    foreach($images as $row)
                                    {
                                        if($c)
                                        {
                                            echo '<div class="carousel-item active" data-interval="10000">';
                                        }
                                        else
                                        {
                                            echo '<div class="carousel-item" data-interval="1000">';
                                        }
                                        $c = false;
                                        echo '<img src="../static/imagenes/productos/' . $row . '" class="d-block w-100" alt="...">';
                                        echo '</div>';
                                    }
                                    echo '</div>';
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
                        <div class="tallas">
                        <?php
                        if(count($tallas)==1)
                        {
                            echo '<h4 class="talla">TALLA: <span class="indice-talla">'.$tallas[0][1].'</span></h4>';
                        }
                        else{
                            if(count($tallas)>1)
                            {
                                echo '<h4 class="talla">TALLA: <span class="indice-talla">'.$tallas[0][1].'</span></h4>';
                                echo '<ul class="lista-tallas">';
                                $c = true;
                                foreach($tallas as $row)
                                {
                                    if($c)
                                    {
                                        if($row[2]>1)
                                        {
                                            echo '<li class="lista-tallas__talla active"><span data-value="'.$row[0].'" class="spanTalla">'.$row[1].'</span></li>';
                                        }
                                        else
                                        {
                                            echo '<li class="lista-tallas__talla active"><span data-value="'.$row[0].'" class="spanTalla nExistencia">'.$row[1].'</span></li>';
                                        }
                                    }
                                    else{
                                        if($row[2]>1)
                                        {
                                            echo '<li class="lista-tallas__talla"><span data-value="'.$row[0].'" class="spanTalla">'.$row[1].'</span></li>';
                                        }
                                        else
                                        {
                                            echo '<li class="lista-tallas__talla"><span data-value="'.$row[0].'" class="spanTalla nExistencia">'.$row[1].'</span></li>';
                                        }
                                    }
                                    $c = false;
                                }
                                echo '</ul>';
                            }
                        }
                        ?>
                        </div>
                        <span id="cantidadC" for="cantidad">Cantidad: </span>
                        <form action="" method="post">
                            <input type="number" min="1" onblur="maximacantidad(<?php echo $existencia; ?>)" value="1" name="cantidad" id="cantidadB">
                            <input type="hidden" id="codigo" name="codigo" value="<?php echo $cod; ?>">
                            <select name="talla" id="talla" class="hidden" name="talla">
                                <?php
                                $c = true;
                                foreach($tallas as $row)
                                {
                                    if($c)
                                    {
                                        echo '<option value="'.$row[0].'" selected="selected" data-value="'.$row[2].'">'.$row[1].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$row[0].'" data-value="'.$row[2].'">'.$row[1].'</option>';
                                    }
                                    $c = false;
                                }
                                ?>
                            </select>
                            <button type="button" name="btnAction" id="btnAction" value="Agregar" class="btn btn-block boton" onclick="enviarC()"> Agregar Al Carrito</button>
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