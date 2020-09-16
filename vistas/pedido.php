<?php
include '../funciones/Metodos.php';
session_start();
$objMetodo = new Metodos();
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
        include '../componentes/menu.php';
        ?>
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
                                <label for="direccion">Especificación</label>
                                <input type="text" name="especificacion" id="especificacion" placeholder="piso/apartamento">
                            </div>
                            <div class="elemento">
                                <label for="departamento">Departamento</label>
                                <select id="departamento" name="departamento">
                                    <?php
                                    $list = $objMetodo->ListaDepartamentos();
                                    echo "<option value='0'>---</option>";
                                    foreach ($list as $row) {
                                        echo '<option value=' . $row[0] . '>' . $row[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="elemento">
                                <label for="ciudad">Ciudad</label>
                                <select id="ciudad" name="ciudad">
                                    <option value='0'>---</option>
                                    <?php/*
                                    $list = $objMetodo->ListaCuidades();
                                    echo "<option value='0'>---</option>";
                                    foreach ($list as $row) {
                                        echo '<option value=' . $row[0] . '>' . $row[2] . '</option>';
                                    }*/
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="txtb">
                            <img class="img" src="../static/icons/icons/description.png" width="30" height="30">
                            <div class="elemento">
                                <label id="lcupon" for="cupon">Cupón</label>
                                <input type="text" name="cupon" id="cupon"></input>
                            </div>
                        </div>
                        <div class="txtb">
                            <img class="img" src="../static/icons/icons/total.png" width="45" height="45">
                            <h3 id="resumen">Resumen Pedido( <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?> )</h3>
                            <div class="elemento">
                                <label for="subtotal">SubTotal</label>
                                <input type="hidden" value="<?php echo $sub; ?>" id="subtotal" name="subtotal">
                                <p id="subtotal">$ <?php echo number_format($sub, 1); ?></p>
                            </div>
                            <div class="elemento">
                                <label for="descuento">Descuento</label>
                                <p id="descuento">$ 0</p>
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
            enviarCupon();
            cambiarCupon();
            llenarCiudad();
            cupon();
            document.getElementById("ciudad").disabled = true;
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
                var cupon = document.getElementById('cupon').value;
                var parametros = {
                    "codigo": ciudad,
                    "subtotal": subtotal,
                    "cupon":cupon
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
        function enviarCupon() {
            $("#cupon").on("blur", function(e) {
                e.preventDefault();
                var ciudad = document.getElementById('ciudad').value;
                var subtotal = document.getElementById('subtotal').value;
                var cupon = document.getElementById('cupon').value;
                var parametros = {
                    "codigo": ciudad,
                    "subtotal": subtotal,
                    "cupon":cupon
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/costoEnvio.php?id=2",
                    "data": parametros
                }).done(function(info) {
                    $("#total").html(info);
                });
            });
        }
        function cambiarCupon() {
            $("#cupon").on("blur", function(e) {
                e.preventDefault();
                var cupon = document.getElementById('cupon').value;
                var subtotal = document.getElementById('subtotal').value;
                var parametros = {
                    "cupon":cupon,
                    "subtotal": subtotal
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/costoEnvio.php?id=3",
                    "data": parametros
                }).done(function(info) {
                    $("#descuento").html(info);
                });
            });
        }
        function llenarCiudad() {
            $("#departamento").on("change", function(e) {
                e.preventDefault();
                var departamento = document.getElementById('departamento').value;
                var parametros = {
                    "departamento": departamento
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/costoEnvio.php?id=4",
                    "data": parametros
                }).done(function(info) {
                    $("#ciudad").html(info);
                    if(departamento=='0')
                    {
                        document.getElementById("ciudad").disabled = true;
                    }
                    else{
                        document.getElementById("ciudad").disabled = false;
                    }
                });
            });
        }
        function cupon() {
            $("#cupon").on("blur", function(e) {
                e.preventDefault();
                var cupon = document.getElementById('cupon').value;
                var parametros = {
                    "cupon":cupon
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/costoEnvio.php?id=5",
                    "data": parametros
                }).done(function(info) {
                    cupon = document.getElementById('cupon').value = info;
                });
            });
        }
    </script>
</body>

</html>