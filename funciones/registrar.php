<?php
include "./Metodos.php";
$obj = new Metodos();
extract($_POST);
$id = $_REQUEST['elemento'];
switch($id)
{
    case 'cupon':
        $sql = "insert into cupon values ('$nombre','$costo');";
        $obj->Actualizar($sql);
        header("location:../VistasA/cupon.php");
    break;

}

