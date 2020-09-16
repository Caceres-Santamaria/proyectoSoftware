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
    <title>Agrega Cupón</title>
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
        include '../componentes/menuA.php';
        ?>
        <section class="padin-section">
            <table class="table table-bordered table-responsive tabla-proveedor">
                <caption>
                    <h2>Listado de Cupones</h2>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th width="5%">ID</th>
                    <th width="17%">% DESCUENTO</th>
                    <th width="8%">ELIMINAR</th>
                    <th width="8%">MODIFICAR</th>
                </tr>
                <?PHP
                if (isset($_GET['categoria']) && isset($_GET['id'])) {
                    $categoria = $_GET['categoria'] . "";
                    if ($_GET['id'] == 1) {
                        $result = $cons->ConProductoC($categoria);
                    } elseif ($_GET['id'] == 2) {
                        $result = $cons->ConProductoT($categoria);
                    }
                } else {
                    $result = $cons->ConProducto();
                }
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row["id_producto"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td>
                            <button type="button" onclick="elimina( '<?php echo $row['id_producto'] ?>','modificarProducto.php',4)" class="boton-modifica-proveedor bt-eliminar">
                                <img src="../static/imagenes/eliminar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                        <td>
                            <button type="button" id="modifica" onclick="modifica( '<?php echo $row['id_producto'] ?>','modificarProducto.php',4)" class="boton-modifica-proveedor bt-modificar">
                                <img id="img" src="../static/imagenes/modificar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
</body>

</html>