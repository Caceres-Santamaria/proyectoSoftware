<?PHP
include "./Metodos.php";
$obj = new Metodos();
extract($_POST);
$id = $_REQUEST['elemento'];
echo $id;
echo $nombre;
echo $imagen;
echo $fecha;
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
        $sql="insert into producto values ('$referencia','$nombre',$costo,'$descripcion',$categoria,$coleccion)";
        $obj->Actualizar($sql);
        header("location: ../VistasA/agregarProducto.php");
    break;
    case 'talla':
        $sql = 'select max(id_talla)+1 from talla';
        $valor = $obj->Consulta($sql);
        $valor = $valor[0][0];
        $sql="insert into talla values ($valor,'$talla')";
        $obj->Actualizar($sql);
        header("location: ../VistasA/tallaProducto.php");
    break;
}