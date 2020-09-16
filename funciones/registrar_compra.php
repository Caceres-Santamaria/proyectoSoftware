<?php
$id = $_REQUEST['id'];
if (isset($_GET['compra'])) {
    $comm = $_GET['compra'];
}else{
    $comm = "";
}
extract($_POST);
include "../funciones/Metodos.php";
$obj = new Metodos();
if ($id_compra == "nada" || $comm == "nada") {
    $sql = "select count(id_compra) from compra";
        $list = $obj->Consulta($sql);
        foreach ($list as $row) {
            $compra = $row[0] + 1;
        }
    if ($id == 1) {
        $sql = "insert into compra values ($compra,current_date,'$proveedor' )";
        $obj->Actualizar($sql);
        $sql = "insert into compra_producto values ($compra,'$idprod',$valor,$cantidad)";
        $obj->Actualizar($sql);
        $sql ="update producto set existencia = existencia + $cantidad where id_producto = '$idprod'";
        $obj->Actualizar($sql);
        header("location: ../vistasA/agregarCompra.php");
    } elseif ($id == 0) {
        $proveedor = $_REQUEST['proveedor'];
        $idprod = $_REQUEST['producto'];
        $cantidad = $_REQUEST['cantidad'];
        $valor = $_REQUEST['valor'];
        $sql = "insert into compra values ($compra,current_date,'$proveedor' )";
        $obj->Actualizar($sql);
        $sql = "insert into compra_producto values ($compra,'$idprod',$valor,$cantidad)";
        $obj->Actualizar($sql);
        $sql ="update producto set existencia = existencia + $cantidad where id_producto = '$idprod'";
        $obj->Actualizar($sql);
        header("location: ../vistasA/agregarCompra.php?pro=$proveedor&com=$compra");
    }
} else {
    if ($id == 1) {
        $sql = "insert into compra_producto values ($id_compra,'$idprod',$valor,$cantidad)";
        $obj->Actualizar($sql);
        $sql ="update producto set existencia = existencia + $cantidad where id_producto = '$idprod'";
        $obj->Actualizar($sql);
        header("location: ../vistasA/agregarCompra.php");
    } elseif ($id == 0) {
        $proveedor = $_REQUEST['proveedor'];
        $compra = $_REQUEST['compra'];
        $idprod = $_REQUEST['producto'];
        $cantidad = $_REQUEST['cantidad'];
        $valor = $_REQUEST['valor'];
        $sql = "insert into compra_producto values ($compra,'$idprod',$valor,$cantidad)";
        $obj->Actualizar($sql);
        $sql ="update producto set existencia = existencia + $cantidad where id_producto = '$idprod'";
        $obj->Actualizar($sql);
        header("location: ../vistasA/agregarCompra.php?pro=$proveedor&com=$compra");
    }
}
