<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
session_start();
$objMetodo = new Metodos();

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

<head>
    <title>Carrito de Compras</title>
    <!-- <script   src="../static/validaciones/jquery-2.2.4.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/estilos/general.css">
    <script src="../static/validaciones/jquery.min.js"></script>
    <script src="../static/slider/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../static/estilos/normalize.css">
    <link rel="stylesheet" href="../static/estilos/glider.min.css">
    <link rel="stylesheet" href="../static/estilos/home.css">
	<script src="https://kit.fontawesome.com/cd1bad9cef.js" crossorigin="anonymous"></script>
    <script src="../static/validaciones/glider.min.js"></script>
    <script src="../static/validaciones/app.js"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <section style="padding: 0px !important; margin: 0px !important; min-height: 400px;">
            <?php
            if (!empty($_SESSION['CARRITO'])) {
                $total = 0;
            ?>
                <div class="table-responsive">
                    <table class="table table-hover tabla-carrito" style="width: 100%; border:0;">
                        <thead>
                            <tr class="carrito-cabecera">
                                <th scope="col" class="text-center">Producto</th>
                                <th scope="col" class="text-center">Imagen</th>
                                <th scope="col" class="text-center">Talla</th>
                                <th scope="col" class="text-center">Cantidad</th>
                                <th scope="col" class="text-center">Precio</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col" class="text-center">Quitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                                $listaP = $objMetodo->getProducto($producto['ID']);
                                foreach ($listaP as $row) {
                                    $nombre = $row[1];
                                    $precio = $row[2];
                                }
                                $images = $objMetodo->getImagenProducto(''.$producto['ID'].'',$_SESSION['imagenes']);
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo strtoupper($nombre) ?></td>
                                    <td class="text-center"><img src="../static/imagenes/productos/<?php echo $images[0]; ?>" width="70px" height="70px"></td>
                                    <td class="text-center"><?php echo $objMetodo->getTalla($producto['TALLA']) ?></td>
                                    <td class="text-center cCantidad"><?php echo $producto['CANTIDAD']; ?></td>
                                    <td class="text-center"><?php echo number_format($precio,1); ?></td>
                                    <td class="text-center"><?php echo number_format($precio * $producto['CANTIDAD'], 1); ?></td>
                                    <td class="text-center">
                                        <form action="" method="post">
                                            <input type="hidden" name="codigo<?php echo $producto['ID'];?>" id="codigo<?php echo $producto['ID'];?>" value="<?php echo $producto['ID'] ?>">
                                            <input type="hidden" name="talla<?php echo $producto['ID'];?>" id="talla<?php echo $producto['ID'];?>" value="<?php echo $producto['TALLA'] ?>">
                                            <button class="btn btn-danger" type="button" name="btnAction" id="btnAction" value="Eliminar" onclick="enviarCA('<?php echo $producto['ID'] ?>')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $total = $total + $precio * $producto['CANTIDAD'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" align="right">
                                    <h3>Total</h3>
                                </td>
                                <td align="right">
                                    <h3><?php echo number_format($total, 1) ?></h3>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <button type="button" class="btn-pedido" onclick="location.href='pedido.php?sub=<?php echo $total ?>'">Realizar Pedido</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <div class="text-center vacio" role="alert" style="margin-bottom: 0 !important;">
                    <h2>No hay productos en el carrito</h2>
                    <a href="inicio.php#categorias">
                        <h2>Ir a comprar</h2>
                    </a>
                </div>
            <?php
            }
            ?>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
    <script>
        function enviarCA(producto) {
            var codigo = document.getElementById('codigo'+producto).value;
            var accion = document.getElementById('btnAction').value;
            var talla = document.getElementById('talla'+producto).value;
            location.href = "../funciones/Carrito.php?cod=" + codigo + "&acc=" + accion + "&talla=" + talla;
        }
    </script>
</body>

</html>