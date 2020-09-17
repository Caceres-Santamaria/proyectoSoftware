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
            <table class="table table-bordered tabla-proveedor table-responsive tabla-scroll">
                <caption>
                    <h2>Pedidos no enviados</h2>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th>NÚMERO</th>
                    <th>CLIENTE</th>
                    <th>DEPARTAMENTO</th>
                    <th>CIUDAD</th>
                    <th>DIRECCIÓN</th>
                    <th>ESPECIFICACIÓN</th>
                    <th>TELÉFONO</th>
                    <th>N° SEGUIMIENTO</th>
                    <th>ESTADO</th>
                    <th>DESCUENTO</th>
                    <th>FECHA</th>
                    <th>MODIFICAR</th>
                </tr>
                <?PHP
                $cons = new Metodos();
                $result = $cons->ConPedido();
                if ($result != null) {
                    foreach ($result as $row) {
                        $ciudad = $cons->getCiudad($row[3]);
                        $departamento = $cons->getDepartamento($row[2]);
                ?>
                    <tr align=center>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $departamento[0][1] ?></td>
                        <td><?php echo $ciudad[0][2] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><?php echo $row[7] ?></td>
                        <td><?php echo $row[8] ?></td>
                        <td><?php echo number_format($row[9],1) ?></td>
                        <td><?php echo $row[10] ?></td>
                        <td>
                            <button type="button" id="modifica" onclick="modifica( '<?php echo $row[0] ?>','pedidos.php',5)" class="boton-modifica-proveedor">
                                <img id="img" src="../static/imagenes/modificar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                    </tr>
                <?php
                }
            }
            else{
                echo '<tr align=center>';
                echo '<td colspan="12">Todos los pedidos se han sido enviados</td>';
                echo ' </tr>';
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