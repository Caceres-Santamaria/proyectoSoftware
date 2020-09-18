<?PHP
include "./Metodos.php";
$obj = new Metodos();
extract($_POST);
$id = $_REQUEST['elemento'];

//echo $referencia.' '.$nombre.' '.$costo.' '.$descripcion.' '.$categoria.' '.$coleccion;

switch($id)
{
    case 'cupon':
        $sql = "update cupon set valor=$costo where id_cupon = '$nombre';";
        $obj->Actualizar($sql);
        header("location:../VistasA/cupon.php");
    break;
    case 'categoria':
        $sql = "update clasificacion set nombre='$nombre',imagen='$imagen' where id_clasficacion = $idC;";
        //echo '<br>'.$sql;
        $obj->Actualizar($sql);
        header("location:../VistasA/categoria.php");
    break;
    case 'coleccion':
        $sql = "update clasificacion set nombre='$nombre',imagen='$imagen' where id_clasficacion = $idC;";
        $obj->Actualizar($sql);
        $sql = "update coleccion set fecha='$fecha' where id_coleccion = $idC;";
        $obj->Actualizar($sql);
        header("location:../VistasA/coleccion.php");
    break;
    case 'producto':
        $sql="update producto set nombre='$nombre', costo=$costo,descripcion='$descripcion',categoria=$categoria,coleccion=$coleccion where referencia = '$referencia'";
        //echo '<br>'.$sql;
        $obj->Actualizar($sql);
        header("location: ../VistasA/modificarProducto.php");
    break;
    case 'stock':
        $referencia=$_REQUEST['referencia'];
        $talla=$_REQUEST['talla'];
        $cantidad=$_REQUEST['cantidad'];
        $sql="update talla_producto set existencia=$cantidad where referencia = '$referencia' and id_talla=$talla";
        //echo '<br>'.$sql;
        $obj->Actualizar($sql);
        header("location: ../VistasA/stock.php");
    break;
    case 'talla':
        $sql="update talla set nombre='$talla' where id_talla = $idT";
        //echo '<br>'.$sql;
        $obj->Actualizar($sql);
        header("location: ../VistasA/tallaProducto.php");
    break;
    case 'pedido':
        $sql="update pedido set nro_seguimiento='$nroseg',estado='$estado' where numero = $numero";
        //echo '<br>'.$sql;
        $obj->Actualizar($sql);
        header("location: ../VistasA/pedidos.php");
    break;
    case 'imagenes':
        $prod=$_REQUEST['prod'];
        $img=$_REQUEST['img'];
        $valor=$_REQUEST['valor'];
        $sql="update imagen_producto set nombre='$valor' where nombre = '$img' and producto='$prod'";
        //echo '<br>'.$sql;
        $obj->Actualizar($sql);
        header("location: ../VistasA/imagenesProducto.php?id=".$prod);
    break;
}