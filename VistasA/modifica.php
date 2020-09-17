<?PHP
include "../funciones/Metodos.php";
session_start();
$id = $_REQUEST['id'];
$pagina = $_REQUEST['pagina'];
$cod = $_REQUEST['cod'];
$obj = new Metodos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
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
            <?php
            switch ($cod) {
                case 1:
                    $sql = "select * from cupon where id_cupon = '$id'";
                    $result = $obj->Consulta($sql);
                    $row = $result[0];
            ?>
                    <table style="width: 40%; background:white;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h3>Actualizar Cupón</h3>
                        </caption>
                        <form method="POST" action="../funciones/actualizar.php?elemento=cupon">
                            <tr id="tabla-encabezado">
                                <td colspan="2" align="center">
                                    <img src="../static/imagenes/cupon.png" width="150px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nombre cupón:*
                                </td>
                                <td>
                                    <input type="text" name="nombre" id="nombre" title="Nombre del cupón" required placeholder="Nombre del cupón" value="<?php echo $row[0]; ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Porcentaje de descuento:*
                                </td>
                                <td>
                                    <input type="text" name="costo" id="costo" title="costo" onclick="noNegativo('costo')" required placeholder="descuento" value="<?php echo $row[1]; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <button type="submit" class="btn bc" class="botmod" name="enviar" value="Actualizar" onclick="return validateForm(this.form)">Actualizar</button>
                                    <button type="button" class="btn bc" class="botmod" onclick="retro('<?php echo $pagina ?>')" name="retroceder" value="Retroceder">Retroceder</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                <?PHP
                    break;
                case 2:
                    $sql = "select  a.id_clasficacion,a.nombre,a.imagen from clasificacion as a inner join categoria as b on a.id_clasficacion = b.id_categoria where b.id_categoria=$id";
                    $result = $obj->Consulta($sql);
                    $row = $result[0];
                ?>
                    <table style="width: 40%; background:white;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h3>Modificar Categoría</h3>
                        </caption>
                        <form method="POST" action="../funciones/actualizar.php?elemento=categoria">
                            <tr id="tabla-encabezado">
                                <td colspan="2" align="center">
                                    <img src="../static/imagenes/<?php echo $row[2]; ?>" width="250px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Id categoría:*
                                </td>
                                <td>
                                    <input type="number" name="idC" id="idC" title="Id categoría" required placeholder="Nombre categoría" value="<?php echo $row[0]; ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nombre categoría:*
                                </td>
                                <td>
                                    <input type="text" name="nombre" id="nombre" title="Nombre categoría" required placeholder="Nombre categoría" value="<?php echo $row[1]; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Imágen:*
                                </td>
                                <td>
                                    <input type="text" name="imagen" id="imagen" title="imagen categoría" required placeholder="nombre de la imagen" value="<?php echo $row[2]; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <button type="submit" class="btn bc" class="botmod" name="enviar" value="Actualizar" onclick="return validateForm(this.form)">Actualizar</button>
                                    <button type="button" class="btn bc" class="botmod" onclick="retro('<?php echo $pagina ?>')" name="retroceder" value="Retroceder">Retroceder</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                <?PHP
                    break;
                case 3:
                    $sql = "select  a.id_clasficacion,a.nombre,b.fecha,a.imagen from clasificacion as a inner join coleccion as b on a.id_clasficacion = b.id_coleccion where b.id_coleccion=$id";
                    $result = $obj->Consulta($sql);
                    $row = $result[0];
                ?>
                    <table style="width: 40%; background:white;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h3>Actualizar Colección</h3>
                        </caption>
                        <form method="POST" action="../funciones/actualizar.php?elemento=coleccion">
                            <tr id="tabla-encabezado">
                                <td colspan="2" align="center">
                                    <img src="../static/imagenes/<?php echo $row[3]; ?>" width="250px">
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>
                                    Id Colección:*
                                </td>
                                <td>
                                    <input type="number" name="idC" id="idC" title="Id colección" required placeholder="Id colección" value="<?php echo $row[0]; ?>" readonly />
                                </td>
                            </tr>
                            <td>
                                Nombre colección:*
                            </td>
                            <td>
                                <input type="text" name="nombre" id="nombre" title="Nombre coleccion" required placeholder="Nombre coleccion" value="<?php echo $row[1]; ?>" />
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    fecha:*
                                </td>
                                <td>
                                    <input type="date" name="fecha" id="fecha" title="fecha coleccion" required placeholder="fecha colección" value="<?php echo $row[2]; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Imágen:*
                                </td>
                                <td>
                                    <input type="text" name="imagen" id="imagen" title="imagen coleccion" required placeholder="nombre de la imagen" value="<?php echo $row[3]; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <button type="submit" class="btn bc" class="botmod" name="enviar" value="Actualizar" onclick="return validateForm(this.form)">Actualizar</button>
                                    <button type="button" class="btn bc" class="botmod" onclick="retro('<?php echo $pagina ?>')" name="retroceder" value="Retroceder">Retroceder</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                <?PHP
                    break;
                case 4:
                    $sql = "select *  from producto where referencia='" . $id . "'";
                    $result = $obj->Consulta($sql);
                    $row = $result[0];
                    $image = $obj->getImagenes($row[0]);
                ?>
                    <table style="width: 40%;" cellpadding="10px" align="center" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h3>Actualizar producto</h3>
                        </caption>
                        <tbody>
                            <form method="POST" action="../funciones/actualizar.php?elemento=producto" onsubmit="return validar_longitud3('id') && validar_longitud40('nombre') && validar_longitud100('descripcion') && validar_longitud30('imagen')&& validar_combos('tipo')&&validar_combos('subcategoria')">
                                <tr id="tabla-encabezado"">
                            <td colspan=" 2" align="center">
                                    <img src="../static/imagenes/productos/<?php echo $image[0]; ?>" width="150px" class="img-prod">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Referencia:*
                                    </td>
                                    <td>
                                        <input type="text" name="referencia" id="referencia" title="id" required placeholder="Referencia del producto" value="<?php echo $row[0]; ?>" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre:*
                                    </td>
                                    <td>
                                        <input type="text" name="nombre" id="nombre" title="nombre" onblur=" minuscula('nombre')" onkeypress="return validar_texto(event)" required placeholder="Escriba nombre del producto" value="<?php echo $row[1]; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Descripcion del producto:*
                                    </td>
                                    <td>
                                        <textarea name="descripcion" id=descripcion title="descripcion" required><?php echo $row[3]; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Valor de venta:*
                                    </td>
                                    <td>
                                        <input type="number" name="costo" id="costo" title="costo" onclick="noNegativo('valor')" onkeypress="return valida_numeros(event)" required placeholder="Escriba el valor de venta" value="<?php echo $row[2]; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Categoría:*
                                    </td>
                                    <td>
                                        <select name="categoria" id="categoria" title="categoria">
                                            <?PHP
                                            $sql = "select a.id_clasficacion,a.nombre from clasificacion as a inner join categoria as b on a.id_clasficacion = b.id_categoria";
                                            $list = $obj->Consulta($sql);
                                            foreach ($list as $row1) {
                                                if ($row[4] == $row1[0]) {
                                                    echo "<option value='$row1[0]' selected>$row1[1]</option>";
                                                } else {
                                                    echo "<option value='$row1[0]'>$row1[1]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Colección:*
                                    </td>
                                    <td>
                                        <select name="coleccion" id="coleccion" title="coleccion">
                                            <?PHP
                                            $sql = "select a.id_clasficacion,a.nombre from clasificacion as a inner join coleccion as b on a.id_clasficacion = b.id_coleccion";
                                            $list = $obj->Consulta($sql);
                                            foreach ($list as $row1) {
                                                if ($row[5] == $row1[0]) {
                                                    echo "<option value='$row1[0]' selected>$row1[1]</option>";
                                                } else {
                                                    echo "<option value='$row1[0]'>$row1[1]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <button type="submit" class="btn bc" class="botmod" name="enviar" value="Actualizar" onclick="return validateForm(this.form)">Actualizar</button>
                                        <button type="button" class="btn bc" class="botmod" onclick="retro('<?php echo $pagina ?>')" name="retroceder" value="Retroceder">Retroceder</button>
                                    </td>
                                </tr>
                            </form>
                    </table>
                <?PHP
                    break;
                case 5:
                    $sql = "select * from pedido where numero =$id";
                    $result = $obj->Consulta($sql);
                    $row = $result[0];
                    $ciudad = $obj->getCiudad($row[3]);
                    $departamento = $obj->getDepartamento($row[2]);
                ?>
                    <table style="width: 40%;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h2>Actualizar pedido</h2>
                        </caption>
                        <tr id="tabla-encabezado">
                            <td colspan="2" align="center">
                                <img src="../static/imagenes/pedidos.png" width="150px">
                            </td>
                        </tr>
                        <form method=POST action="../funciones/actualizar.php?elemento=pedido" id="pedido" onsubmit="return validar_combos('domicilio') && validar_combos('cliente') && validar_combos('empresaenvio') && validar_combos('estado')">
                            <tr>
                                <td>
                                    Número de pedido:*
                                </td>
                                <td>
                                    <input type="text" name="pedidoId" id="idped" title="idpedido" required value="<?php echo $row[0] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cliente:*
                                </td>
                                <td>
                                    <input type="text" disabled id="cliente" title="cliente" required value="<?php echo $row[1] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Departamento:*
                                </td>
                                <td>
                                    <input type="text" disabled id="departamento" title="departamento" required value="<?php echo $departamento[0][1] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ciudad:*
                                </td>
                                <td>
                                    <input type="text" disabled id="ciudad" title="ciudad" required value="<?php echo $ciudad[0][2] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dirección de envío:*
                                </td>
                                <td>
                                    <input type="text" disabled id="direccione" title="direccion" required value="<?php echo $row[4] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Especificacion:*
                                </td>
                                <td>
                                    <input type="text" disabled id="especificacion" title="especificacion" required value="<?php echo $row[5] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Teléfono:
                                </td>
                                <td>
                                    <input type="number" id="tel" title="teléfono" value="<?php echo $row[6] ?>" readonly disabled />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Número de seguimiento:
                                </td>
                                <td>
                                    <input type="text" name="nroseg" id="nroseg" title="nroseg" onchange="return validar_longitud20('direccion')" value="<?php echo $row[7] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Estado del pedido:*
                                </td>
                                <td>
                                    <select name="estado" id="estado" title="estado">
                                        <?PHP
                                        if ($row[8] == 'no enviado') {
                                            echo "<option value='no enviado' selected>no enviado</option>";
                                            echo "<option value='enviado' >enviado</option>";
                                        } else {
                                            echo "<option value='no enviado' >no enviado</option>";
                                            echo "<option value='enviado' selected >enviado</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Descuento:*
                                </td>
                                <td>
                                    <input type="text" disabled id="costo" title="costo" required value="<?php echo "$ " . $row[9]; ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fecha:
                                </td>
                                <td>
                                    <input type="date" id="fecfa" title="fecfa" value="<?php echo $row[10] ?>" readonly disabled />
                                    <input type="hidden" name="pagina" value="<?php echo $pagina ?>">
                                    <input type="hidden" name="cod" value="<?php echo $cod ?>">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <button type="submit" class="btn bc" class="botmod" name="enviar" value="enviar" onclick="return validateForm(this.form)">Enviar</button>
                                    <button type="button" class="btn bc" class="botmod" onclick="retro('<?php echo $pagina ?>')" name="retroceder" value="Retroceder">Retroceder</button>
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
                <?PHP
                    break;
                case 6:
                    $sql = "select  * from talla where id_talla=$id";
                    $result = $obj->Consulta($sql);
                    $row = $result[0];
                ?>
                    <table style="width: 40%; background:white;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h3>Agregar Talla</h3>
                        </caption>
                        <form method="POST" action="../funciones/actualizar.php?elemento=talla">
                            <tr id="tabla-encabezado">
                                <td colspan="2" align="center">
                                    <img src="../static/imagenes/t-shirt.jpg" width="250px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Id Talla:*
                                </td>
                                <td>
                                    <input type="number" name="id" id="id" title="Id talla" required placeholder="Nombre talla" value="<?php echo $row[0]; ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nombre talla:*
                                </td>
                                <td>
                                    <input type="text" name="talla" id="talla" title="Nombre del talla" required placeholder="Nombre del cupón" value="<?php echo $row[1] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <button type="submit" class="btn bc" class="botmod" name="enviar" value="actualizar" onclick="return validateForm(this.form)">Actualizar</button>
                                    <button type="button" class="btn bc" class="botmod" onclick="retro('<?php echo $pagina ?>')" name="retroceder" value="Retroceder">Retroceder</button>
                                </td>
                            </tr>
                        </form>
                    </table>
            <?PHP
                    break;
            }
            ?>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
</body>

</html>