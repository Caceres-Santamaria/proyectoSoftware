<?php
include '../funciones/Metodos.php';
session_start();
$objMetodo = new Metodos();
$usuario = $_SESSION['usuario'];
$sub = $_REQUEST['sub']
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../static/validaciones/valida.js"></script>
    <title>Pedido</title>
    <link rel="stylesheet" href="../static/estilos/general.css">
    <script src="../static/validaciones/jquery-2.2.4.min.js"></script>
    <script src="../static/slider/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="contenedor">
        <div class="row justify-content-md-center">
            <?php
            include '../componentes/menu.php';
            ?>
        </div>
        <section class=" text-center padin-section">
            <div class="row justify-content-md-center align-items-center ">
                <div class="col-sm-12 align-self-center ">
                    <form action="../funciones/pedido.php" class="confirmaPedido" id="frm" method="post">
                        <h1 id="iniciar">Confirmación de pedido</h1>
                        <div class="txtb ">
                            <img class="img" src="../static/icons/icons/ubicacion.png" width="30" height="30">
                            <br>
                            <div class="elemento">
                                <label for="persona">Nombres y apellidos</label>
                                <input type="text" name="persona" id="persona" title="nombre" onkeypress="return validar_textopersona(event) && validar_longitud40('persona')">
                            </div>
                            <div class="elemento">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" onkeypress="return validar_numeros(event)">
                            </div>
                            <div class="elemento">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion">
                            </div>
                            <div class="elemento">
                                <label for="ciudad">Ciudad</label>
                                <select id="ciudad" name="ciudad">
                                    <?php
                                    $list = $objMetodo->ListaCuidades();
                                    echo "<option value='0'>---</option>";
                                    foreach ($list as $row) {
                                        echo '<option value=' . $row[0] . '>' . $row[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="txtb">
                            <img class="img" src="../static/icons/icons/description.png" width="30" height="30">
                            <div class="elemento">
                                <label id="ldescripcion" for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="txtb">
                            <img class="img" src="../static/icons/icons/total.png" width="45" height="45">
                            <h3 id="resumen">Resumen Pedido( <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?> )</h3>
                            <div class="elemento">
                                <label for="subtotal">SubTotal</label>
                                <input type="hidden" value="<?php echo $sub; ?>" id="subtotal">
                                <p id="subtotal">$ <?php echo number_format($sub, 2); ?></p>
                            </div>
                            <div class="elemento">
                                <label for="CostoE">Costo Envío</label>
                                <p id="costoE">$ 0</p>
                            </div>
                            <div class="elemento">
                                <label for="total">Total</label>
                                <p id="total">$ <?php echo number_format($sub, 2); ?></p>
                            </div>
                        </div>
                        <div class="enviaP">
                            <button type="submit">Realizar Pedido</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
    <script>
        $(document).on("ready", function() {
            enviarDatos();
            enviarTotal();
        });

        function enviarDatos() {
            $("#ciudad").on("click", function(e) {
                e.preventDefault();
                var ciudad = document.getElementById('ciudad').value;
                var parametros = {
                    "codigo": ciudad
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/costoEnvio.php?id=0",
                    "data": parametros
                }).done(function(info) {
                    $("#costoE").html(info);
                });
            });
        }

        function enviarTotal() {
            $("#ciudad").on("click", function(e) {
                e.preventDefault();
                var ciudad = document.getElementById('ciudad').value;
                var subtotal = document.getElementById('subtotal').value;
                var parametros = {
                    "codigo": ciudad,
                    "subtotal": subtotal
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/costoEnvio.php?id=1",
                    "data": parametros
                }).done(function(info) {
                    $("#total").html(info);
                });
            });
        }
    </script>
</body>

</html>