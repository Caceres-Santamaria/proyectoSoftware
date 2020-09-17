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
    <title>Stock productos</title>
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
                <caption>Buscar Producto:</caption>
                <tr>
                    <th>Referencia</th>
                </tr>
                <tr>
                    <td>
                        <input onblur="verifica()" type="text" name="referencia" id="referencia" title="referencia" >
                    </td>
                    <td>
                        <button type="button" id="buscar" onclick="recarga()" class="btn bc" disabled>Buscar</button>
                    </td>
                </tr>
            </table>
            <br><br>
            <table class="table table-bordered table-responsive tabla-proveedor tabla-scroll">
                <caption>
                    <h2>Stock de los productos</h2>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th width="5%">REFERENCIA</th>
                    <th width="17%">NOMBRE</th>
                    <th width="5%">TALLA</th>
                    <th width="17%">EXISTENCIA</th>
                    <th width="8%">MODIFICAR</th>
                </tr>
                <?PHP
                if (isset($_GET['referencia'])) {
                    $referencia = $_GET['referencia'] . "";
                    if($referencia == "todos")
                    {
                        $result = $cons->stock2();
                    }
                    else{
                        $result = $cons->stock($referencia."");
                    }
                } else {
                    $result = $cons->stock2();
                }
                if($result != null){
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><input type="number" name="<?php echo $row[0].$row[4] ?>" id="<?php echo $row[0].$row[4] ?>" value="<?php echo $row[3] ?>"></td>
                        <td>
                            <button type="button" id="modifica" onclick="modificaT('<?php echo $row[0] ?>','<?php echo $row[4] ?>')" class="boton-modifica-proveedor bt-modificar">
                                <img id="img" src="../static/imagenes/modificar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                    </tr>
                <?php
                }
            }
            else
            {
                echo '<tr align=center>';
                echo '<td colspan="7">No se ha encontrado el producto</td>';
                echo '</tr>';
            }
                ?>
            </table>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
    <script>
        function verifica() {
            var referencia = document.getElementById("referencia").value;
            if(referencia == ""){
                document.getElementById("buscar").disabled = true;
            }
            else{
                document.getElementById("buscar").disabled = false;
            }
        }
        function recarga() {
            var referencia = document.getElementById("referencia").value;
            location.href = "../VistasA/stock.php?referencia=" + referencia;
        }
    </script>
</body>

</html>