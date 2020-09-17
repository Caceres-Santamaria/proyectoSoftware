
<?php
session_start();
$clasificacion = $_REQUEST['clasificacion'];
include "../funciones/Metodos.php";
$objMetodo= new Metodos();
$nombre = $objMetodo->getNombreClasificacion($clasificacion);
if(isset($_SESSION[''.$nombre.''])){
    $Catalogo = $_SESSION[''.$nombre.''];
}
else{
    $cat = $objMetodo->countCategoria($clasificacion);
    if($cat == 1)
    {
        $_SESSION[''.$nombre.''] = $objMetodo->categoriaProducto($clasificacion);
        $Catalogo = $_SESSION[''.$nombre.''];
    }
    else
    {
        $_SESSION[''.$nombre.''] = $objMetodo->coleccionProducto($clasificacion);
        $Catalogo = $_SESSION[''.$nombre.''];
    }
}
if(!isset($_SESSION['imagenes']))
{
    $images = array();
    $productos = $objMetodo->getProductos();
    foreach($productos as $row)
    {
        $imagenes = $objMetodo->getImagenes($row[0]);
        array_push($images,array(
            'ID'=>$row[0],
            'IMAGES'=>$imagenes
        ));
    }
    $_SESSION['imagenes'] = $images;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="../static/estilos/general.css">
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
        <section>
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title" style=" font-size: 30px !important; text-align: center !important;" id="Pul"><?php echo $nombre ?></h1>
                </div>
                <div class="card-body catalogo">
                    <?php

                    $num = 0;
                    echo '<div class="row fila">';
                    foreach ($Catalogo as $reg) {
                        $images = $objMetodo->getImagenProducto(''.$reg[0].'',$_SESSION['imagenes']);
                        if (($num % 3) == 0) {
                            echo '</div>';
                            echo '<div class="row fila">';
                            echo '<div class="col-sm-4 ">';
                            echo '<div class="card carta" style="width: 18rem;">';
                            echo '<img class="card-img-top image" src="../static/imagenes/productos/' . $images[0] . '" alt="' . $reg[1] . '">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title nombre">' . $reg[1] . '</h5>';
                            $cod = "" . $reg[0];
                            echo '<p class="card-text precio" style="color: #65D110; font-size: 25px;">$' .number_format($reg[4],0) . '</p>';
                    ?>
                            <button type='button' class='btn boton btn-lg btn-block agregar' onclick="enviar('<?php echo $cod ?>')">Agregar</button>
                        <?php
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $num++;
                        } else {
                            echo '<div class="col-sm-4 ">';
                            echo '<div class="card carta" style="width: 18rem;">';
                            echo '<img class="card-img-top image" src="../static/imagenes/productos/' . $images[0] . '" alt="' . $reg[1] . '">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title nombre">' . $reg[1] . '</h5>';
                            $cod = "" . $reg[0];
                            echo '<p class="card-text precio" style="color: #65D110; font-size: 25px;">$' .number_format( $reg[4],0) . '</p>';
                        ?>
                            <button type='button' class='btn boton btn-lg btn-block agregar' onclick="enviar('<?php echo $cod ?>')">Agregar</button>
                    <?php
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $num++;
                        }
                    }

                    ?>

                </div>
            </div>

        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
</body>
</html>