<?php
    include '../funciones/Metodos.php';
    session_start();
    $objMetodo = new Metodos();
    $usuario = $_SESSION['usuario'];
    extract($_POST);
    $ciu = $_POST['ciudad'];
    $idDomi = $objMetodo->idDomi($ciu);
    
    $lista = $objMetodo->getUsuario($_SESSION['usuario']);
    foreach ($lista as $row){
        $codigo = $row[3];
    }
    $cant = $objMetodo->CuentaPedidos() + 1;
    $objMetodo->InsertPedido($cant, $direccion, $descripcion,$idDomi,$codigo,$persona,$telefono);
    foreach ($_SESSION['CARRITO'] as $indice=>$producto){
        $cantidad = $producto['CANTIDAD'];
        $codP = $producto['ID'];
        $sql="select valor_venta from producto where id_producto='$codP'";
        $list=$objMetodo->Consulta($sql);
        foreach($list as $row)
        {
            $valor=$row[0];
        }
        $objMetodo->InsertDetalle($cant,$codP,$cantidad,$valor);
        $sql ="update producto set existencia = existencia - $cantidad where id_producto = '$codP'";
        $objMetodo->Actualizar($sql);
    }
    $sql = "insert into factura values ((select count(numero_factura) from factura)+1,current_date,$cant)";
    $objMetodo->Actualizar($sql);
    unset($_SESSION['CARRITO']);
    header("location: ../funciones/creaTienda.php");

?>