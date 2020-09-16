<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Flamma</title>
        <script>
            function ingresar(){
                location.href = "funciones/creaTienda.php";
            }
        </script>
    </head>
    <body onload="ingresar()">
        <?php
            session_start();
            ?>
    </body>
</html>
