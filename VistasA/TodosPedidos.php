<?PHP
include "../funciones/Metodos.php";
session_start();
$cons = new Metodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los pedidos</title>
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
            <table class="tablafecha">
                <caption>Buscar Por:</caption>
                <tr>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                </tr>
                <tr>
                    <td>
                        <input onchange="return validar_fecha() && activarFecha()" type="date" name="fecha" id="fecha" title="fechainicio">
                    </td>
                    <td>
                        <input onchange="validaFechaFinal()" type="date" name="fechafin" id="fechafin" title="fechafin" onchange="return validar_fechafin()">
                    </td>
                    <td>
                        <button type="button" id="buscar" onclick="recarga()" class="btn bc">Buscar</button>
                    </td>
                </tr>
            </table>
            <table class="table table-bordered tabla-proveedor tabla-scroll">
                <caption>
                    <br> <br> <br> <br>
                    <h2>Listado de pedidos</h2>
                </caption>
                <tr align=center>
                    <th>NÚMERO</th>
                    <th> FECHA</th>
                    <th>CLIENTE</th>
                    <th>COSTO ENVÍO</th>
                    <th>DESCUENTO</th>
                    <th>SUBTOTAL PEDIDO</th>
                    <th>TOTAL</th>
                </tr>
                <?PHP
                if (isset($_GET['fi']) && isset($_GET['ff'])) {
                    $fechainicial = $_GET['fi'];
                    $fechafinal = $_GET['ff'];
                    $sql = "select a.numero, a.fecha,a.cliente,(select costo from ciudad where a.ciudad=id_ciudad) as domi, (select sum(b.cantidad * b.precio_unidad) from detalle_pedido as b where b.numero_pedido=a.numero) as subtotal,a.descuento from pedido as a where a.fecha between '$fechainicial' and '$fechafinal'";
                    $result = $cons->Consulta($sql);
                } else {
                    $sql = "select a.numero, a.fecha,a.cliente,(select costo from ciudad where a.ciudad=id_ciudad) as domi, (select sum(b.cantidad * b.precio_unidad) from detalle_pedido as b where b.numero_pedido=a.numero) as subtotal,a.descuento from pedido as a";
                    $result = $cons->Consulta($sql);
                }
                if ($result != null) {
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo '$ ' . number_format($row[3], 0) ?></td>
                        <td><?php echo '$ ' . number_format($row[5], 0) ?></td>
                        <td><?php echo '$ ' . number_format($row[4], 0) ?></td>
                        <td><?php echo '$ ' . number_format($row[4]-$row[5]+$row[3], 0) ?></td>
                    </tr>
                <?php
                }
            }
            else
            {
                echo '<tr align=center>';
                echo '<td colspan="7">No se han realizado pedidos en estas fechas</td>';
                echo '</tr>';
            }
                ?>
            </table>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
    <script>
        $(document).on("ready", function() {
            var fechainicio = document.getElementById("fecha").value;
            var fechafin = document.getElementById("fechafin").value;
            if ((fechafin == "") || (fechainicio == "")) {
                document.getElementById('buscar').disabled = true;
                document.getElementById("fechafin").disabled = true;
            }
        });

        function activarFecha() {
            var fecha = document.getElementById("fecha").value;
            if (fecha == "") {
                document.getElementById("fechafin").disabled = true;
            } else {
                document.getElementById("fechafin").disabled = false;
            }
        }

        function validaFechaFinal() {
            var fechaf = document.getElementById("fechafin").value;
            var fechai = document.getElementById("fecha").value;
            if (fechaf == "") {
                document.getElementById("buscar").disabled = true;
            } else {
                if (fechaf >= fechai) {
                    document.getElementById("buscar").disabled = false;
                } else {
                    document.getElementById("buscar").disabled = true;
                    document.getElementById("fechafin").value = "";
                    alert("La fecha final no puede ser menor a la fecha inicial");
                }
            }
        }

        function recarga() {
            var fechainicio = document.getElementById("fecha").value;
            var fechafin = document.getElementById("fechafin").value;
            location.href = "../VistasA/TodosPedidos.php?fi=" + fechainicio + "&ff=" + fechafin;
        }
    </script>
</body>

</html>