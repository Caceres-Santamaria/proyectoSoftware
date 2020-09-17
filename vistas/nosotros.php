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
</head>

<body>
    <div class="contenedor">
        <div class="row justify-content-md-center">
            <?php
            include '../componentes/menu.php';
            ?>
        </div>
        <main class="content_us">
            <div class="nosotros">
                <h2>ACERCA DE NOSOTROS</h2>
                <p class="descripcion">
                El sitio web de flamma permite a los usuarios visualizar sus productos de interés por medio de categorías o colecciones, 
                seleccionarlos y ver su descripción, seleccionar la talla que desee para su prenda si está disponible, así como la 
                cantidad que desea comprar de cada producto, seguido de esto podrá agregarlo al carrito. Para confirmar el pedido, al usuario 
                se le solicitan los datos básicos para el envío de sus productos, tales como el nombre, dirección, número de contacto y ciudad 
                hacia dónde va dirigido el pedido, según esta, se le agrega el costo del envío, si el usuario reside en el área metropolitana de Bucaramanga, 
                tendrá la opción de hacer el pago contra entrega. Por otro lado, si en el momento en que el cliente desee realizar una compra el producto no se encuentre 
                disponible, el cliente podrá solicitar un aviso de stock, que llegará directamente al correo electrónico que deb brindar para poder ser notificado, 
                este correo avisará que esta nuevamente en stock el producto que deseaba. 
                </p>
                <div class="imagen">
                <img src="../static/imagenes/us2.JPG" alt="">
                </div>
                <p class="autores">AUTORES:</p>
                <p class="autores" >Nelson Alexis Cáceres Carreño</p>
                <p class="autores">Jenny Marcela Santamaría Rincón</p>
                
            </div>
        </main>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
</body>

</html>