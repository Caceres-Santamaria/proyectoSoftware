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
                    $list = $obj->getDatosUsuario($id);
                    foreach ($list as $row) {
                        $id = $row["identificacion"];
                        $pnom = $row["primer_nombre"];
                        $snom =  $row["segundo_nombre"];
                        $pap = $row["primer_apellido"];
                        $sap = $row["segundo_apellido"];
                        $tel = $row["telefono"];
                        $dir = $row["direccion"];
                        $email = $row["email"];
                        $fechanac = $row["fecha_nacimiento"];
                        $sexo = $row["sexo"];
                        $ciu = $row["id_ciudad"];
                    }
            ?>
                    <table style="width: 40%;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <tbody>
                            <caption>
                                <h2>Modificar datos</h2>
                            </caption>
                            <form method=POST action="../funciones/modifica.php" id="cliente" onsubmit="return validar_cedula() && validar_telefono() && validar_combos('ciudad')">
                                <tr>
                                    <td>
                                        Cedula:*
                                    </td>
                                    <td>
                                        <input type="text" name="cedula" id="cedula" title="cedula" required onkeypress="return validar_numeros(event)" value="<?php echo $id ?>" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Primer nombre:*
                                    </td>
                                    <td>
                                        <input type="text" name="pnombre" id="pnombre" required title="primer nombre" onblur=" minuscula('pnombre')" value="<?php echo $pnom ?>" onkeypress="return validar_texto(event)" onchange="return validar_longitud_nom('pnombre')" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Segundo nombre:
                                    </td>
                                    <td>
                                        <input type="text" name="snombre" id="snombre" title="segundo nombre" onblur=" minuscula('snombre')" onchange="return validar_longitud_nom('snombre')" onkeypress="return validar_texto(event)" value="<?php echo $snom ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Primer apellido:*
                                    </td>
                                    <td>
                                        <input type="text" name="papellido" id="papellido" title="primer apellido" onblur=" minuscula('papellido')" onchange="return validar_longitud_nom('papellido')" onkeypress="return validar_texto(event)" required value="<?php echo $pap ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Segundo apellido:
                                    </td>
                                    <td>
                                        <input type="text" name="sapellido" id="sapellido" title="segundo apellido" onblur=" minuscula('sapellido')" onchange="return validar_longitud_nom('sapellido')" onkeypress="return validar_texto(event)" value="<?php echo $sap ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email:*
                                    </td>
                                    <td>
                                        <input type="email" name="email" id="email" title="email" required onchange="return validar_longitud40('email') && validar_email()" value="<?php echo $email ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dirección:*
                                    </td>
                                    <td>
                                        <input type="text" name="direccion" title="dirección" onchange="return validar_longitud40('direccion')" required value="<?php echo $dir ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Teléfono:*
                                    </td>
                                    <td>
                                        <input type="tel" name="telefono" id="telefono" title="telefono" required onkeypress="return validar_numeros(event)" value="<?php echo $tel ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Fecha de nacimiento:*
                                    </td>
                                    <td>
                                        <input type="date" required name="fecha" id="fecha" title="fecha de nacimiento" onchange="return validar_fecha()" value="<?php echo $fechanac ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sexo:*
                                    </td>
                                    <td class="radio">
                                        <?php
                                        switch ($sexo) {
                                            case 'F':
                                        ?>
                                                <input type="radio" class="radio" name="sexo" value="F" title="sexo" style="height:15px;width:50px;" checked>Femenino<br>
                                                <input type="radio" class="radio" name="sexo" value="M" title="sexo" style="height:15px;width:50px;">Masculino<br>
                                                <input type="radio" class="radio" name="sexo" value="O" title="sexo" style="height:15px;width:50px;">Otro<br>
                                            <?php
                                                break;
                                            case 'M':
                                            ?>
                                                <input type="radio" class="radio" name="sexo" value="F" title="sexo" style="height:15px;width:50px;">Femenino<br>
                                                <input type="radio" class="radio" name="sexo" value="M" title="sexo" style="height:15px;width:50px;" checked>Masculino<br>
                                                <input type="radio" class="radio" name="sexo" value="O" title="sexo" style="height:15px;width:50px;">Otro<br>
                                            <?php
                                                break;
                                            case 'O':
                                            ?>
                                                <input type="radio" class="radio" name="sexo" value="F" title="sexo" style="height:15px;width:50px;">Femenino<br>
                                                <input type="radio" class="radio" name="sexo" value="M" title="sexo" style="height:15px;width:50px;">Masculino<br>
                                                <input type="radio" class="radio" name="sexo" value="O" title="sexo" style="height:15px;width:50px;" checked>Otro<br>
                                        <?php
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ciudad:*
                                    </td>
                                    <td>
                                        <select name="ciudad" title="ciudad" id="ciudad">
                                            <?PHP
                                            $sql = "select * from ciudad";
                                            $result1 = pg_query($con, $sql);
                                            while ($row = pg_fetch_array($result1)) {
                                                $codigo = $row["id_ciudad"];
                                                $nombre = $row["nombre_ciudad"];
                                                if ($codigo == $ciu) {
                                                    echo "<option value=" . $codigo . " selected>" . $nombre . "</option>";
                                                } else {
                                                    echo "<option value=" . $codigo . ">" . $nombre . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
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
                case 2:
                    $id = $id . "";
                    $sql = "select *  from empresa_envio where id_empresa_envio='" . $id . "'";
                    $list = $obj->Consulta($sql);
                    foreach ($list as $row) {
                        $id = $row["id_empresa_envio"];
                        $nom = $row["nombre"];
                        $tel = $row["telefono"];
                        $dir = $row["direccion"];
                        $email = $row["email"];
                        $pagweb = $row["pagina_web"];
                    }
                ?>
                    <table style="width: 40%;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <tbody>
                            <caption>
                                <h2>Modificar empresa de envio</h2>
                            </caption>
                            <form method="POST" action="../funciones/modifica.php" onsubmit="return validar_telefono() && validar_longitud10('id')">
                                <tr>
                                    <td>
                                        Id:*
                                    </td>
                                    <td>
                                        <input type="number" name="id" id="id" title="id" required onkeypress="return validar_numeros(event)" onclick="noNegativo('id')" value="<?php echo $id ?>" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre:*
                                    </td>
                                    <td>
                                        <input type="text" name="nombre" id="nombre" required title="nombre" onblur=" minuscula('nombre')" value="<?php echo $nom ?>" onkeypress="return validar_texto(event)" onchange="return validar_longitud_nom('nombre')" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email:*
                                    </td>
                                    <td>
                                        <input type="email" name="email" id="email" title="email" onchange="return validar_longitud40('email') && validar_email()" value="<?php echo $email ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dirección:*
                                    </td>
                                    <td>
                                        <input type="text" name="direccion" title="dirección" onchange="return validar_longitud40('direccion')" required value="<?php echo $dir ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Teléfono:*
                                    </td>
                                    <td>
                                        <input type="tel" name="telefono" id="telefono" title="telefono" required onkeypress="return validar_numeros(event)" value="<?php echo $tel ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Página web:*
                                    </td>
                                    <td>
                                        <input type="text" name="paginaweb" id="paginaweb" title=paginaweb onchange="return validar_longitud20('paginaweb')" value="<?php echo $pagweb ?>" />
                                    </td>
                                    <input type="hidden" name="pagina" value="<?php echo $pagina ?>">
                                    <input type="hidden" name="cod" value="<?php echo $cod ?>">
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
                case 3:
                    $sql = "select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, a.id_empresa_envio, a.id_estado,a.persona,a.telefono,a.fecha from pedido as a where id_pedido=$id";
                    $list = $obj->Consulta($sql);
                    foreach ($list as $row) {
                        $id = $row[0];
                        $dir = $row[1];
                        $hora = $row[2];
                        $descripcion = $row[3];
                        $domi = $row[4];
                        $cliente =  $row[5];
                        $nroseg = $row[6];
                        $empresaenvio = $row[7];
                        $estado = $row[8];
                        $persona = $row[9];
                        $telefono = $row[10];
                        $fecha = $row[11];
                    }
                ?>
                    <table style="width: 40%;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <caption>
                            <h2>Modificar pedido</h2>
                        </caption>
                        <form method=POST action="../funciones/modifica.php" id="pedido" onsubmit="return validar_combos('domicilio') && validar_combos('cliente') && validar_combos('empresaenvio') && validar_combos('estado')">
                            <tr>
                                <td>
                                    Id del pedido:*
                                </td>
                                <td>
                                    <input type="text" name="pedidoId" id="idped" title="idpedido" required onclick="noNegativo('id')" onkeypress="return validar_numeros(event)" value="<?php echo $row[0] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dirección de envío:*
                                </td>
                                <td>
                                    <input type="text" disabled id="direccion" title="direccion" onchange="return validar_longitud40('direccion')" required value="<?php echo $dir ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hora pedido:*
                                </td>
                                <td>
                                    <input type="time" disabled id="hora" title="hora" required value="<?php echo $hora ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Descripción:
                                </td>
                                <td>
                                    <textarea disabled id="descripcion" title="descripcion" onchange="return validar_longitud100('direccion')" name="descripcion" readonly><?php echo $descripcion ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Costo:*
                                </td>
                                <td>
                                    <input type="text" disabled id="costo" title="costo" required value="<?php echo "$ " . $domi; ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cliente:*
                                </td>
                                <td>
                                    <input type="text" disabled id="cliente" title="cliente" required value="<?php echo $cliente ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Número de seguimiento:
                                </td>
                                <td>
                                    <input type="number" name="nroseg" id="nroseg" title="nroseg" onclick="noNegativo('nroseg')" onchange="return validar_longitud20('direccion')" value="<?php echo $nroseg ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Empresa de envío:*
                                </td>
                                <td>
                                    <select name="empresaenvio" id="empresaenvio" title="empresaenvio">
                                        <?PHP
                                        $sql = "select * from empresa_envio";
                                        $list = $obj->Consulta($sql);
                                        foreach ($list as $row) {
                                            $id = $row["id_empresa_envio"];
                                            $nombre = $row["nombre"];
                                            if ($id == $empresaenvio) {
                                                echo "<option value=" . $id . " selected>" . $nombre . "</option>";
                                            } else {
                                                echo "<option value=" . $id . ">" . $nombre . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Estado del pedido:*
                                </td>
                                <td>
                                    <select name="estado" id="estado" title="estado">
                                        <?PHP
                                        $sql = "select * from estado_pedido";
                                        $list = $obj->Consulta($sql);
                                        foreach ($list as $row) {
                                            $ides = $row["id_estado"];
                                            $nombre = $row["nombre"];
                                            if ($ides == $estado) {
                                                echo "<option value=" . $ides . " selected>" . $nombre . "</option>";
                                            } else {
                                                echo "<option value=" . $ides . ">" . $nombre . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            <tr>
                                <td>
                                    Persona:
                                </td>
                                <td>
                                    <input type="text" id="persona" title="persona" value="<?php echo $persona ?>" readonly disabled />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Teléfono:
                                </td>
                                <td>
                                    <input type="number" id="tel" title="teléfono" value="<?php echo $telefono ?>" readonly disabled />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fecha:
                                </td>
                                <td>
                                    <input type="date" id="fecfa" title="fecfa" value="<?php echo $fecha ?>" readonly disabled />
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
                case 4:
                    $sql = "select *  from producto where id_producto='" . $id . "'";
                    $list = $obj->Consulta($sql);
                    foreach ($list as $row) {
                        $id = $row[0];
                        $nom = $row[1];
                        $existencia =  $row["existencia"];
                        $descripcion = $row["descripcion"];
                        $valorventa = $row["valor_venta"];
                        $imagen = $row["imagen"];
                        $subcategoria = $row["id_subcategoria"];
                        $tipo = $row["id_tipo_producto"];
                        $simg = $row["segunda_imagen"];
                    }
                ?>
                    <table style="width: 40%;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <tbody>
                            <caption>
                                <h2>Modificar producto</h2>
                            </caption>
                            <form method=POST action="../funciones/modifica.php" id="producto" onsubmit="return validar_longitud3('id') && validar_longitud40('nombre') && validar_longitud100('descripcion') && validar_longitud30('imagen')&& validar_combos('tipo')&&validar_combos('subcategoria')">
                                <tr>
                                    <td>
                                        Id producto:*
                                    </td>
                                    <td>
                                        <input type="text" name="idprod" id="idprod" title="idprod" onkeypress="return validar_numeros(event)" required value="<?php echo $id ?>" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre:*
                                    </td>
                                    <td>
                                        <input type="text" name="nombre" id="nombre" title="nombre" onblur=" minuscula('nombre')" required value="<?php echo $nom ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Imágen:*
                                    </td>
                                    <td>
                                        <input type="text" name="imagen" id="imagen" title="imagen" required value="<?php echo $imagen ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Segunda imágen:*
                                    </td>
                                    <td>
                                        <input type="text" name="simagen" id="simagen" title="simagen" value="<?php echo $simg ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Descripcion del producto:*
                                    </td>
                                    <td>
                                        <input type="text" name="descripcion" id=descripcion title="descripcion" value="<?php echo $descripcion ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Valor de venta:*
                                    </td>
                                    <td>
                                        <input type="number" name="valorventa" id="valorventa" title="valor" onclick="noNegativo('valor')" onkeypress="return valida_numeros(event)" required value="<?php echo $valorventa ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Existencia:*
                                    </td>
                                    <td>
                                        <input type="number" name="existencia" id="existencia" onclick="noNegativo('existencia')" onkeypress="return valida_numeros(event)" title="existencia" required value="<?php echo $existencia ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tipo de producto:*
                                    </td>
                                    <td>
                                        <select name="tipo" id="tipo" title="tipo">
                                            <?PHP
                                            $sql = "select * from tipo_producto";
                                            $list = $obj->Consulta($sql);
                                            foreach ($list as $row) {
                                                $idtipo = $row["id_tipo_producto"];
                                                $nombre = $row["nombre"];
                                                if ($idtipo == $tipo) {
                                                    echo "<option value=" . $idtipo . " selected>" . $nombre . "</option>";
                                                } else {
                                                    echo "<option value=" . $idtipo . ">" . $nombre . "</option>";
                                                }
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
                                        <select name="subcategoria" id="subcategoria" title="subcategoria">
                                            <?PHP
                                            $sql = "select * from subcategoria_producto";
                                            $list = $obj->Consulta($sql);
                                            foreach ($list as $row) {
                                                $idsub = $row["id_subcategoria"];
                                                $nombre = $row["nombre"];
                                                if ($idsub == $subcategoria) {
                                                    echo "<option value=" . $idsub . " selected>" . $nombre . "</option>";
                                                } else {
                                                    echo "<option value=" . $idsub . ">" . $nombre . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="pagina" value="<?php echo $pagina ?>">
                                    <input type="hidden" name="cod" value="<?php echo $cod ?>">
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
                case 5:
                    $sql = "select *  from proveedor where identificacion=$id";
                    $list = $obj->Consulta($sql);
                    foreach ($list as $row) {
                        $id = $row["identificacion"];
                        $nom = $row["nombre"];
                        $email = $row["email"];
                        $dir = $row["direccion"];
                        $tel = $row["telefono"];
                        $ciu = $row["id_ciudad"];
                        $paginaweb =  $row["pagina_web"];
                        $nrocuenta = $row["nro_cuenta"];
                        $entidadbancaria = $row["entidad_bancaria"];
                    }
                ?>
                    <table style="width: 40%;" cellpadding="10px" class="table table-bordered tabla-proveedor">
                        <tbody>
                            <caption>
                                <h2>Modificar proveedor</h2>
                            </caption>
                            <form method=POST action="../funciones/modifica.php" id="proveedor" onsubmit="return validar_telefono() && validar_combos('ciudad')">
                                <tr>
                                    <td>
                                        Identificación:*
                                    </td>
                                    <td>
                                        <input type="number" name="id" id="id" title="id" onkeypress="return valida_numeros(event)" onclick="noNegativo('id')" required value="<?php echo $id ?>" readonly />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre:*
                                    </td>
                                    <td>
                                        <input type="text" name="nombre" id="nombre" title="nombre" onblur=" minuscula('nombre')" onkeypress="return validar_texto(event)" required value="<?php echo $nom ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pagina web:
                                    </td>
                                    <td>
                                        <input type="text" name="pagweb" id="paginaweb" title="paginaweb" value="<?php echo $paginaweb ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email:
                                    </td>
                                    <td>
                                        <input type="email" name="email" id="email" title="email" onchange="return validar_email() && validar_longitud40('email')" value="<?php echo $email ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dirección:
                                    </td>
                                    <td>
                                        <input type="text" name="direccion" id="direccion" title="direccion" onchange="return validar_longitud40('direccion')" value="<?php echo $dir ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Teléfono:*
                                    </td>
                                    <td>
                                        <input type="tel" name="telefono" id="telefono" title="telefono" onkeypress="return validar_numeros(event)" required value="<?php echo $tel ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Entidad bancaria:
                                    </td>
                                    <td>
                                        <input type="text" name="ebancaria" id="ebancaria" title="ebancaria" onblur=" minuscula('ebancaria')" onkeypress="return validar_texto(event)" onchange="return validar_longitud('ebancaria')" value="<?php echo $entidadbancaria ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Número de cuenta:
                                    </td>
                                    <td>
                                        <input type="number" name="nrocuenta" id="nrocuenta" title="nrocuenta" onkeypress="return valida_numeros(event)" onclick="noNegativo('nrocuenta')" value="<?php echo $nrocuenta ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ciudad:*
                                    </td>
                                    <td>
                                        <select name="ciudad" title="ciudad" id="ciudad">
                                            <?PHP
                                            $sql = "select * from ciudad";
                                            $list = $obj->Consulta($sql);
                                            foreach ($list as $row) {
                                                $codigo = $row["id_ciudad"];
                                                $nombre = $row["nombre_ciudad"];
                                                if ($codigo == $ciu) {
                                                    echo "<option value=" . $codigo . " selected>" . $nombre . "</option>";
                                                } else {
                                                    echo "<option value=" . $codigo . ">" . $nombre . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="pagina" value="<?php echo $pagina ?>">
                                    <input type="hidden" name="cod" value="<?php echo $cod ?>">
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