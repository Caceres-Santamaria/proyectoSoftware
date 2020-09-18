<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
session_start();
$cons = new Metodos();
$id = $_REQUEST['id'];
$sql = "select nombre from producto where referencia = '$id'";
$list = $cons->Consulta($sql);
$nombre = $list[0];
$imagenes = $cons->getImagenes($id);
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes producto</title>
    <link rel="stylesheet" href="../static/estilos/general.css">
    <link rel="stylesheet" href="../static/estilos/normalize.css">
    <link rel="stylesheet" href="../static/estilos/home.css">
    <script src="https://kit.fontawesome.com/cd1bad9cef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../static/estilos/prueba.css" />
    <script src="../static/js/splide.min.js"></script>
    <script src="../static/validaciones/prueba.js"></script>
    <link rel="stylesheet" href="../static/css/splide.min.css" />
    <script src="../static/validaciones/valida.js"></script>
</head>

<body>
    <div class="contenedor">
        <?php
        include '../componentes/menuA.php';
        ?>
        <section class="padin-section">
        <table style="width: 40%; background:white;margin:auto;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                <caption>
                    <h3>Agregar Imágen</h3>
                </caption>
                <form method="POST" action="../funciones/registrar.php?elemento=imagen">
                    <tr id="tabla-encabezado">
                        <td colspan="2" align="center">
                            <img src="../static/imagenes/slider2.jpg" width="250px">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Referencia Producto:*
                        </td>
                        <td>
                            <input type="text" name="referencia" id="referencia" title="referencia del producto" required placeholder="Nombre de la imágen" value="<?php echo $id ?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombre Producto:*
                        </td>
                        <td>
                            <input type="text" name="nombreP" id="nombreP" title="nombre del producto" required placeholder="Nombre de la imágen" value="<?php echo $nombre[0] ?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombre Imágen:*
                        </td>
                        <td>
                            <input type="text" name="nombre" id="nombre" title="Nombre de la imágen" required placeholder="Nombre de la imágen" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <button type="submit" name="enviar" value="Enviar" class="btn bc">Registrar</button>
                            <button type="button" class="btn bc" class="botmod" onclick="retro('imagenes.php')" name="retroceder" value="Retroceder">Retroceder</button>
                        </td>
                    </tr>
                </form>
            </table>
            <br><br>
            <?php
            if(count($imagenes)>=1)
            {?>
            <div class="slider-producto">
                <div class="splide__container">
                    <div id="primary-slider" class="splide p-splide--primary">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                foreach ($imagenes as $img) {
                                    echo '<li class="splide__slide p-splide__slide">';
                                    echo '<img src="../static/imagenes/productos/' . $img . '" alt="Sample Image 01" />';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div id="secondary-slider" class="splide p-splide--secundary">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                foreach ($imagenes as $img) {
                                    echo '<li class="splide__slide p-splide__slide">';
                                    echo '<img src="../static/imagenes/productos/' . $img . '" alt="Sample Image 01" />';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <table class="table table-bordered tabla-proveedor tabla-scroll" style="margin:auto;">
                <caption>
                    <h3><?php echo $nombre[0] ?></h3>
                </caption>
                <tr align=center id="tabla-encabezado">
                    <th>NOMBRE IMÁGEN</th>
                    <th>ELIMINAR</th>
                    <th>MODIFICAR</th>
                </tr>
                <?PHP
                $c=0;
                foreach ($imagenes as $row) {
                ?>
                    <tr align=center>
                        <td><input type="text" id="imagen<?php echo $c; ?>" name="imagen<?php echo $c; ?>" value="<?php echo $row ?>"></td>
                        <td>
                            <button type="button" onclick="eliminaIMG('<?php echo $id ?>','<?php echo $row ?>')" class="boton-modifica-proveedor bt-eliminar">
                                <img src="../static/imagenes/eliminar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                        <td>
                            <button type="button" id="modifica" onclick="modificaIM( '<?php echo $id ?>','imagen<?php echo $c; ?>','<?php echo $row ?>')" class="boton-modifica-proveedor bt-modificar">
                                <img id="img" src="../static/imagenes/modificar.png" height="30px" width="30px" alt="">
                            </button>
                        </td>
                    </tr>
                <?php
                $c++;
                }
                ?>
            </table>
            <?php } ?>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
    <script>
        function verifica() {
            var referencia = document.getElementById("referencia").value;
            if (referencia == "") {
                document.getElementById("buscar").disabled = true;
            } else {
                document.getElementById("buscar").disabled = false;
            }
        }

        function recarga() {
            var referencia = document.getElementById("referencia").value;
            location.href = "../VistasA/imagenes.php?referencia=" + referencia;
        }
    </script>
</body>

</html>