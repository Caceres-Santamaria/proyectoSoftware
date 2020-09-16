<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
$obj = new Metodos();
session_start();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega Producto</title>
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
            <table style="width: 40%;" cellpadding="10px" align="center" class="table table-bordered tabla-proveedor">
                <caption>
                    <h3>Agregar producto</h3>
                </caption>
                <tbody>
                    <form method="POST" action="../funciones/registrar_producto.php" onsubmit="return validar_longitud3('id') && validar_longitud40('nombre') && validar_longitud100('descripcion') && validar_longitud30('imagen')&& validar_combos('tipo')&&validar_combos('subcategoria')">
                        <tr id="tabla-encabezado"">
                            <td colspan=" 2" align="center">
                            <img src="../static/imagenes/slider2.jpg" width="400px" class="img-prod">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Id producto:*
                            </td>
                            <td>
                                <input type="text" name="idprod" id="id" title="id" onkeypress="return validar_numeros(event)" required placeholder="Escriba el id del producto" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre:*
                            </td>
                            <td>
                                <input type="text" name="nombre" id="nombre" title="nombre" onblur=" minuscula('nombre')" onkeypress="return validar_texto(event)" required placeholder="Escriba nombre del producto" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Imagen:*
                            </td>
                            <td>
                                <input type="text" name="imagen" id="imagen" title="imagen" required placeholder="Escriba el nombre de la imagen" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Descripcion del producto:*
                            </td>
                            <td>
                                <input type="text" name="descripcion" id=descripcion title="descripcion" required placeholder="Escriba la descripcion del producto" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Valor de venta:*
                            </td>
                            <td>
                                <input type="number" name="valorventa" id="valor" title="valor" onclick="noNegativo('valor')" onkeypress="return valida_numeros(event)" required placeholder="Escriba el valor de venta" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Existencia:*
                            </td>
                            <td>
                                <input type="number" name="existencia" id="existencia" onclick="noNegativo('existencia')" onkeypress="return valida_numeros(event)" title="existencia" required placeholder="Escriba la existencia del producto" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tipo de producto:*
                            </td>
                            <td>
                                <select name="combo1" id="tipo" title="tipo">
                                    <option value="vacio">...</option>
                                    <?PHP
                                    $sql = "select * from tipo_producto";
                                    $list = $obj->Consulta($sql);
                                    foreach ($list as $row) {
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Subcategoria de producto:*
                            </td>
                            <td>
                                <select name="combo2" id="subcategoria" title="subcategoria">
                                    <option value="vacio">...</option>
                                    <?PHP
                                    $sql = "select * from subcategoria_producto";
                                    $list = $obj->Consulta($sql);
                                    foreach ($list as $row) {
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <button type="submit" name="enviar" value="enviar" class="btn bc">Enviar</button>
                                <button type="reset" name="resetear" value="Resetear" class="btn bc">Resetear</button>
                            </td>
                        </tr>
                    </form>
            </table>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php'
        ?>
    </div>
</body>

</html>