<?php
include '../funciones/Metodos.php';
$objMetodo = new Metodos();
$id = $_REQUEST['id'];
$cupon = $_POST['cupon'];
if($id==0)
{
    $sql = "select nombre from talla where id_talla=$cupon";
    $result = $objMetodo->Consulta($sql);
    foreach($result as $row)
    {
        echo $row[0];
    }
}
else{
    $prod = $_POST['prod'];
    $sql = "select existencia from talla_producto where id_talla=$cupon and referencia= '$prod'";
    $result = $objMetodo->Consulta($sql);
    foreach($result as $row)
    {
        echo $row[0];
    }
}
?>