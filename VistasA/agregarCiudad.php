<!DOCTYPE html lang="es">
<?php
include "../funciones/Metodos.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega Ciudad</title>
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
        <section class="padin-section modifica">
            <table style="width: 40%; background:white;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                <caption>
                    <h3>Agregar Ciudad</h3>
                </caption>
                <form method="POST" action="../funciones/registrar_ciudad.php">
                    <tr id="tabla-encabezado">
                        <td colspan="2" align="center">
                            <img src="../static/imagenes/mapa.png" width="150px" onsubmit="return valida_longitud30('nombre') && valida_longitud20('paginaweb') && validar_telefono() && validar_combos('ciudad')">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Identificador:*
                        </td>
                        <td>
                            <input type="number" name="id" id="id" title="id" onkeypress="return validar_numeros(event)" onclick="noNegativo('id')" required placeholder="Escriba el identificador" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombre de la ciudad:*
                        </td>
                        <td>
                            <input type="text" name="nombre" id="nombre" title="nombre" onblur=" minuscula('nombre')" onkeypress="return validar_texto(event)" required placeholder="Escriba nombre de la ciudad" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Costo domicilio:*
                        </td>
                        <td>
                            <input type="number" name="costo" id="costo" title="costo" onkeypress="return validar_numeros(event)" onclick="noNegativo('costo')" required placeholder="costo domicilio" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <button type="submit" name="enviar" value="Enviar" class="btn bc">Enviar</button>
                            <button type="reset" name="resetear" value="Resetear" class="btn bc">Resetear</button>
                        </td>
                    </tr>
                </form>
            </table>
            <br><br>
            <table class="table table-bordered tabla-proveedor">
                <caption>
                    <h3>Listado de Ciudades</h3>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>ELIMINAR</th>
                </tr>
                <?PHP
                $cons = new Metodos();
                $sql = "select * from ciudad";
                $result = $cons->Consulta($sql);
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td>
                            <button type="button" onclick="eliminaCiu( '<?php echo $row[0] ?>')" class="boton-modifica-proveedor bt-eliminar">
                                <img src="../static/imagenes/eliminar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
</body>

</html>