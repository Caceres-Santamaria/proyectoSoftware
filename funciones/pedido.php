<?php
    include '../funciones/Metodos.php';
    session_start();
    $objMetodo = new Metodos();
    extract($_POST);
    $cont = $objMetodo->contCupon(''.$cupon);
    if($cont == 0)
    {
        $descuento = 0;
    }
    else
    {
        $valor = $objMetodo->getDescuento($cupon);
        $descuento = $subtotal*$valor;
    }
    $cant = $objMetodo->CuentaPedidos() + 1;
    $objMetodo->InsertPedido($cant,$persona,$departamento,$ciudad,$direccion,$especificacion,$telefono,$descuento);
    foreach ($_SESSION['CARRITO'] as $indice=>$producto){
        $cantidad = $producto['CANTIDAD'];
        $codP = $producto['ID'];
        $talla = $producto['TALLA'];
        $sql="select costo from producto where referencia='$codP'";
        $list=$objMetodo->Consulta($sql);
        foreach($list as $row)
        {
            $valor=$row[0];
        }
        $objMetodo->InsertDetalle($cant, $codP, $talla, $cantidad, $valor);
        $sql ="update talla_producto set existencia = existencia - $cantidad where referencia = '$codP' and id_talla = '$talla'";
        $objMetodo->Actualizar($sql);
    }
    unset($_SESSION['CARRITO']);
    header("location: ../vistas/inicio.php");
?>