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
            <table class="table table-bordered tabla-proveedor">
                <caption>
                    <br> <br> <br> <br>
                    <h2>Listado de pedidos</h2>
                </caption>
                <tr align=center>
                    <th>ID</th>
                    <th> FECHA Y HORA</th>
                    <th>CLIENTE</th>
                    <th>EMPRESA DE ENVIO</th>
                    <th>COSTO DOMICILIO</th>
                    <th>SUBTOTAL PEDIDO</th>
                </tr>
                <?PHP
                if (isset($_GET['fi']) && isset($_GET['ff'])) {
                    $fechainicial = $_GET['fi'];
                    $fechafinal = $_GET['ff'];
                    $sql = "select a.id_pedido, a.hora,(select costo from domicilio where a.id_domicilio=id_domicilio) as domi, id_cliente, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio,a.fecha, (select sum(b.cantidad * b.precio_unidad) from pedido_producto as b where b.id_pedido=a.id_pedido) as subtotal from pedido as a where fecha between '$fechainicial' and '$fechafinal'";
                    $result = $cons->Consulta($sql);
                } else {
                    $sql = "select a.id_pedido, a.hora,(select costo from domicilio where a.id_domicilio=id_domicilio) as domi, id_cliente, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio,a.fecha, (select sum(b.cantidad * b.precio_unidad) from pedido_producto as b where b.id_pedido=a.id_pedido) as subtotal from pedido as a";
                    $result = $cons->Consulta($sql);
                }
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row["id_pedido"] ?></td>
                        <td><?php echo $row["fecha"] . " " . $row["hora"] ?></td>
                        <td><?php echo $row["id_cliente"] ?></td>
                        <td><?php echo $row["empresa_envio"] ?></td>
                        <td><?php echo '$ ' . number_format($row["domi"], 0) ?></td>
                        <td><?php echo '$ ' . number_format($row["subtotal"], 0) ?></td>
                    </tr>
                <?php
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
            location.href = "../vistasC/pedidos.php?fi=" + fechainicio + "&ff=" + fechafin;
        }
    </script>
</body>

</html>