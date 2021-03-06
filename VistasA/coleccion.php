<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
session_start();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleccion</title>
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
                    <h3>Agregar Colección</h3>
                </caption>
                <form method="POST" action="../funciones/registrar.php?elemento=coleccion">
                    <tr id="tabla-encabezado">
                        <td colspan="2" align="center">
                            <img src="../static/imagenes/coleccion.png" width="250px">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombre colección:*
                        </td>
                        <td>
                            <input type="text" name="nombre" id="nombre" title="Nombre coleccion"  required placeholder="Nombre coleccion"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            fecha:*
                        </td>
                        <td>
                        <input type="date" name="fecha" id="fecha" title="fecha coleccion"  required placeholder="fecha colección"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Imágen:*
                        </td>
                        <td>
                        <input type="text" name="imagen" id="imagen" title="imagen coleccion"  required placeholder="nombre de la imagen"/>
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
            <table class="table table-bordered tabla-proveedor tabla-scroll">
                <caption>
                    <h3>Listado de colecciones</h3>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>FECHA</th>
                    <th>NOMBRE IMÁGEN</th>
                    <th>IMÁGEN</th>
                    <th>ELIMINAR</th>
                    <th>MODIFICAR</th>
                </tr>
                <?PHP
                $cons = new Metodos();
                $sql = "select  a.id_clasficacion,a.nombre,b.fecha,a.imagen from clasificacion as a inner join coleccion as b on a.id_clasficacion = b.id_coleccion";
                $result = $cons->Consulta($sql);
                foreach ($result as $row) {
                ?>
                    <tr align=center>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><img src="../static/imagenes/<?php echo $row[3] ?>" alt="<?php echo $row[1] ?>" width="120px"></td>
                        <td>
                            <button type="button" onclick="elimina('<?php echo $row[0] ?>','coleccion','coleccion.php')" class="boton-modifica-proveedor bt-eliminar">
                                <img src="../static/imagenes/eliminar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                        <td>
                            <button type="button" id="modifica" onclick="modifica( '<?php echo $row[0] ?>','coleccion.php',3)" class="boton-modifica-proveedor bt-modificar">
                                <img id="img" src="../static/imagenes/modificar.png" height="30px" width="30px" alt="">
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