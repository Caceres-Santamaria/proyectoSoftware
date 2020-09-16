<?php
include "../funciones/Metodos.php";
$objMetodo= new Metodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/estilos/normalize.css">
    <link rel="stylesheet" href="../static/estilos/glider.min.css">
    <link rel="stylesheet" href="../static/estilos/home.css">
    <link rel="stylesheet" href="../static/estilos/nosotros.css">
    <title>About us</title>
    <script src="../static/validaciones/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cd1bad9cef.js" crossorigin="anonymous"></script>
    <script src="../static/validaciones/glider.min.js"></script>
    <script src="../static/validaciones/app.js"></script>
    <link rel="stylesheet" href="../static/estilos/terminos.css">
    <title>Términos y condiciones</title>
</head>
<body>
    <div class="contenedor">
        <div class="row justify-content-md-center">
            <?php
            include '../componentes/menu.php';
            ?>
        </div>
        <main class="content_terminos">
            <div class="terminos">
                <h2>TÉRMINOS Y CONDICIONES</h2>
                <ol>
                    <h4>
                        <li>ENVÍOS</li>
                    </h4>
                    <p>
                        Todos los envíos son realizados desde Bucaramanga.
                        Para ciudades principales se demoran entre 2-4 días hábiles en llegar,
                        ciudades secundarias pueden demorar entre 5 y 10 días hábiles en llegar.
                        Las transportadoras con las cuales trabajamos son ENVIA e interrapidismo.
                        El envío es gratis por compras desde $70,000 si es menor a este valor, pagarías $10,000 por el valor del flete.
                        Los domicilios en Bucaramanga se despachan de 3 horas a 1 día hábil.
                    </p>
                    <h4>
                        <li>POLÍTICA DE DEVOLUCIONES Y REEMBOLSOS</li>
                    </h4>
                    <p>
                        Puedes devolver tu compra realizada en nuestra tienda online, en un plazo de 30 días desde la fecha de recepción
                        del paquete y te reembolsaremos el valor total.
                    </p>
                    <h4>2.1 POLÍTICA DE CAMBIOS Y GARANTÍAS</h4>
                    <p> se prodrá realizar cambios en un plazo de 30 días desde la recepción del paquete el proceso se realiza vía WhatsApp
                        indicando por cual prenda se realizara el cambio, si es de menor valor devolvemos el excedente si es de mayor valor
                        el cliente da el excedente
                    </p>
                    <h4>2.2 NO ACEPTAMOS CAMBIOS NI DEVOLUCIONES EN LOS SIGUIENTES CASOS</h4>
                    <ul type="disc">
                        <li>Si las prendas se han dañado por un mal uso.</li>
                        <li>Si la prenda presenta cualquier señal de uso, mal olor, sudoración, maquillaje, etc.</li>
                        <li>Por mal lavado o un lavado diferente al que la prenda lo requiere</li>
                        <li>Prendas en promoción no tienen cambio.</li>
                        <li>Medias no tienen cambio.</li>
                    </ul>
                    <h4>2.3 INSTRUCCIONES DE DEVOLUCIÓN DE PRODUCTOS</h4>
                    <p>Para devolver un producto, sigue estas instrucciones:
                        Comunícate por whatsapp al 3187251299 y asegúrate que tienes la siguiente información a mano:
                        <ul type="disc">
                            <li>Nombre y cédula de quién realizó la compra</li>
                            <li>Número de pedido</li>
                            <li>Fecha del pedido</li>
                            <li>Dirección de recogida</li>
                            <li>Número de teléfono</li>
                        </ul>
                        <p>
                            Si tu solicitud es autorizada, asegúrate de que todos los artículos lleven las etiquetas originales.
                        </p>
                    </p>
                </ol>
            </div>
        </main>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
</body>

</html>