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
            <table class="table table-bordered table-responsive tabla-proveedor">
                <caption>Buscar Por:</caption>
                <tr>
                    <td>Tipo Producto</td>
                    <td>
                        <select name="tipo" id="tipo" onblur="regarga()">
                            <?php
                            $sql = "select * from tipo_producto";
                            $list = $cons->Consulta($sql);
                            foreach ($list as $row) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sub Categoria</td>
                    <td>
                        <select name="subtipo" id="subtipo" onblur="regarga1()">
                            <?php
                            $sql = "select * from subcategoria_producto";
                            $list = $cons->Consulta($sql);
                            foreach ($list as $row) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered table-responsive tabla-proveedor">
                <caption>
                    <h2>Listado de productos</h2>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th width="5%">ID</th>
                    <th width="17%">NOMBRE</th>
                    <th width="8%"> EXISTENCIA</th>
                    <th width="18%">DESCRIPCIÓN</th>
                    <th width="8%">COSTO</th>
                    <th width="10%">IMAGEN</th>
                    <th width="10%">SUBCATEGORIA</th>
                    <th width="8%">TIPO</th>
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
                        <td><?php echo $row["existencia"] ?></td>
                        <td><?php echo $row["descripcion"] ?></td>
                        <td><?php echo number_format($row["valor_venta"], 0) ?></td>
                        <td><img src='../static/imagenes/productos/<?php echo $row["imagen"] ?>' width="80px" height="80px"></td>
                        <td><?php echo $row["sub"] ?></td>
                        <td><?php echo $row["tipo"] ?></td>
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