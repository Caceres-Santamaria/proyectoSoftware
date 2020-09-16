<?php
include '../funciones/Metodos.php';
$objMetodo = new Metodos();
$id = $_REQUEST['id'];

if($_POST['codigo'] != 0){
$costo = $objMetodo->costoEnvio($_POST['codigo']);
if($id == 0){
    echo "$ ".number_format($costo,2);
}elseif($id == 1){
$subtotal = $_POST['subtotal'];
$total = $subtotal + $costo;
echo "$ ".number_format($total,2);
}
}
elseif($id == 0){
    $costo = 0;
    echo "$ ".number_format($costo,2);
}else{
    $subtotal = $_POST['subtotal'];
    echo "$ ".number_format($subtotal,2);
}

?>