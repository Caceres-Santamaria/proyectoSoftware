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
            include '../componentes/menuA.php';
            ?>
        </div>
        <main class="content_us">
            <div class="nosotros">
                <h2>ACERCA DE NOSOTROS</h2>
                <p class="descripcion">
                Los usuarios administradores pueden agregar, modificar y eliminar productos, ver los productos mas vendidos 
                y los menos vendidos en un periodo de tiempo determinado, agregar, modificar o quitar cupones de descuento 
                que serán aplicados al total del pedido. También podrán ver las ventas realizadas eligiendo una fecha de inicio 
                y una de fin, ver los pedidos pendientes de envío y modificarles el estado, así como también poder agregarles el número de seguimiento. 
                También pueden gestionar las categorías y las colecciones, por último, modificar el stock de los productos.
                </p>
                <div class="imagen">
                <img src="../static/imagenes/us1.JPG" alt="">
                </div>
                <p class="autores">AUTORES:
                </p>
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