<?php
include '../funciones/Metodos.php';
$objMetodo = new Metodos();
$codigo = $_POST['codigo'];
$sql = "select nombre from producto where id_producto ='$codigo'";
$list = $objMetodo->Consulta($sql);
$nombre = "";
foreach($list as $row){
    $nombre = $row[0];
}
if($nombre == ""){
    echo "no existe";
}else{
    echo $nombre;
}
?>