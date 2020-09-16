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
                <p>Creamos con el objetivo de inspirar a las personas a expresarse y encontrar su identidad</p>
                <img src="../static/imagenes/us1.JPG" alt="">
                <p>Somos talento colombiano desde el diseño hasta la confección siendo una
                    comunidad de inspiración para todo aquel que la usa.
                    Tenemos la mente joven y estamos siempre atentos a cada idea para el
                    crecimiento de la marca esperamos que la gente se identifique y puedan ser
                    ellos mismos</p>
                <img src="../static/imagenes/us2.JPG" alt="">
                <p>El streetwear nos da la posibilidad de crear sin ser enfocado a un genero, optando con prendas
                    con actitud y sin restricciones. Tenemos un espíritu artesando donde las personas son lienzo
                    y queremos que quien la use se sienta cómodo y a la vez pueda verse lujoso y sensacional.
                </p>
            </div>
        </main>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
</body>

</html>