<?php
include "./Metodos.php";
$obj = new Metodos();
extract($_POST);
$id = $_REQUEST['elemento'];
echo $id;
//echo $referencia.' '.$nombre.' '.$costo.' '.$descripcion.' '.$categoria.' '.$coleccion;
switch($id)
{
    case 'cupon':
        $sql = "insert into cupon values ('$nombre','$costo');";
        $obj->Actualizar($sql);
        header("location:../VistasA/cupon.php");
    break;
    case 'categoria':
        $sql = 'select max(id_clasficacion)+1 from clasificacion';
        $valor = $obj->Consulta($sql);
        $valor = $valor[0][0];
        $sql = "insert into  clasificacion values ($valor,'$nombre','$imagen');";
        $obj->Actualizar($sql);
        $sql = "insert into  categoria values ($valor);";
        $obj->Actualizar($sql);
        header("location:../VistasA/categoria.php");
    break;
    case 'coleccion':
        $sql = 'select max(id_clasficacion)+1 from clasificacion';
        $valor = $obj->Consulta($sql);
        $valor = $valor[0][0];
        $sql = "insert into clasificacion values ($valor,'$nombre','$imagen');";
        $obj->Actualizar($sql);
        $sql = "insert into coleccion values ($valor,'$fecha');";
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
