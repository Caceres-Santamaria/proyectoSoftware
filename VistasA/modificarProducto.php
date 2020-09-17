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
    <title>Productos</title>
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
            <table class="table table-bordered tabla-proveedor tabla-busqueda">
                <caption>Buscar Por:</caption>
                <tr>
                    <td>Categoría</td>
                    <td>
                        <select name="tipo" id="tipo" onblur="regarga()">
                            <?php
                            $sql = "select a.id_clasficacion,a.nombre from clasificacion as a inner join categoria as b on a.id_clasficacion = b.id_categoria";
                            $list = $cons->Consulta($sql);
                            foreach ($list as $row) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Colección</td>
                    <td>
                        <select name="subtipo" id="subtipo" onblur="regarga1()">
                            <?php
                            $sql = "select a.id_clasficacion,a.nombre from clasificacion as a inner join coleccion as b on a.id_clasficacion = b.id_coleccion";
                            $list = $cons->Consulta($sql);
                            foreach ($list as $row) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-responsive tabla-proveedor tabla-scroll">
                <caption>
                    <h2>Listado de productos</h2>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th width="5%">REFERENCIA</th>
                    <th width="17%">NOMBRE</th>
                    <th width="8%"> IMÁGEN</th>
                    <th width="8%"> COSTO</th>
                    <th width="28%">DESCRIPCIÓN</th>
                    <th width="12%">CATEGORÍA</th>
                    <th width="10%">COLECCIÓN</th>
                    <th width="6%">ELIMINAR</th>
                    <th width="6%">MODIFICAR</th>
                </tr>
                <?PHP
                if (isset($_GET['categoria']) && isset($_GET['id'])) {
                    $categoria = $_GET['categoria'] . "";
                    if ($_GET['id'] == 1) {
                        $result = $cons->ConProductoCat($categoria);
                    } elseif ($_GET['id'] == 2) {
                        $result = $cons->ConProductoCol($categoria);
                    }
                } else {
                    $result = $cons->ConProducto();
                }
                foreach ($result as $row) {
                    $image = $cons->getImagenes($row[0]);
                ?>
                    <tr align=center>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><img src='../static/imagenes/productos/<?php echo $image[0] ?>' width="80px" height="80px"></td>
                        <td><?php echo number_format($row[2], 0) ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[5] ?></td>
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