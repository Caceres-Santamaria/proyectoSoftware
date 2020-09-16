<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
session_start();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos no enviados</title>
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
            <table class="table table-bordered tabla-proveedor table-responsive">
                <caption>
                    <h2>Pedidos no enviados</h2>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th>ID</th>
                    <th>DIRECCIÓN</th>
                    <th>FECHA Y HORA</th>
                    <th>DESCRIPCIÓN</th>
                    <th>COSTO DOMI</th>
                    <th>CLIENTE</th>
                    <th>N° SEGUIMIENTO</th>
                    <th>EMPRESA ENVÍO</th>
                    <th>ESTADO</th>
                    <th>PERSONA</th>
                    <th>TELÉFONO</th>
                    <th>MODIFICAR</th>
                </tr>
                <?PHP
                $cons = new Metodos();
                $result = $cons->ConPedido();
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row["id_pedido"] ?></td>
                        <td><?php echo $row["direccion"] ?></td>
                        <td><?php echo $row["fecha"] . " " . $row["hora"] ?></td>
                        <td><?php echo $row["descripcion"] ?></td>
                        <td><?php echo $row["domi"] ?></td>
                        <td><?php echo $row["cliente"] ?></td>
                        <td><?php echo $row["nro_seguimiento"] ?></td>
                        <td><?php echo $row["empresa_envio"] ?></td>
                        <td><?php echo $row["estado"] ?></td>
                        <td><?php echo $row["persona"] ?></td>
                        <td><?php echo $row["telefono"] ?></td>
                        <td>
                            <button type="button" id="modifica" onclick="modifica( '<?php echo $row['id_pedido'] ?>','pedidos.php',3)" class="boton-modifica-proveedor">
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