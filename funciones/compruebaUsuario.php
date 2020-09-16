<?php
include '../funciones/Metodos.php';
$objMetodo = new Metodos();
$usuario = $_POST['usuario'];
$list = $objMetodo->CuentaUsuario($usuario);
foreach($list as $row){
    $cont = $row[0];
}
if($cont == 0){
    echo $usuario;
}else{
    echo " ";
}

?>