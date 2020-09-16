<?php
include "../funciones/Metodos.php";
$obj = new Metodos();
$id = $_REQUEST['id'];
$sql = "delete from ciudad where id_ciudad = '$id'";
$obj->Actualizar($sql);
header("location: ../vistasA/agregarCiudad.php");

?>