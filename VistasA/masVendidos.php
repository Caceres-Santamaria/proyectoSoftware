<?PHP
include "../funciones/Metodos.php";
session_start();
$cons = new Metodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más vendidos</title>
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
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>IMÁGEN</th>
                    <th>CANTIDAD VENDIDA</th>
                </tr>
                <?PHP
                if (isset($_GET['fi']) && isset($_GET['ff'])) {
                    $fechainicial = $_GET['fi'];
                    $fechafinal = $_GET['ff'];
                    $sql = "select distinct a.id_producto,a.nombre,a.imagen,(select sum(b.cantidad) as cant from pedido_producto as b where b.id_producto = a.id_producto) from producto as a inner join pedido_producto as c on a.id_producto=c.id_producto inner join pedido as p on p.id_pedido=c.id_pedido where p.fecha between '$fechainicial' and '$fechafinal' order by cant desc";
                    $result = $cons->Consulta($sql);
                } else {
                    $sql = "select distinct a.id_producto,a.nombre,a.imagen,(select sum(b.cantidad) as cant from pedido_producto as b where b.id_producto = a.id_producto) from producto as a inner join pedido_producto as c on a.id_producto=c.id_producto order by cant desc";
                    $result = $cons->Consulta($sql);
                }
                if ($result != null) {
                    foreach ($result as $row) {
                ?>
                        <tr align=center style="vertical-align: middle !important;">
                            <td><?php echo $row[0] ?></td>
                            <td><?php echo $row[1] ?></td>
                            <td><img src="../static/imagenes/productos/<?php echo $row[2] ?>" alt="Producto" width="150px" height="150px"></td>
                            <td><?php echo $row[3] ?></td>
                        </tr>
                <?php
                    }
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
            location.href = "../vistasC/masVendidos.php?fi=" + fechainicio + "&ff=" + fechafin;
        }
    </script>
</body>

</html>