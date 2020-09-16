<?php
session_start();

$accion = $_REQUEST['acc'];

switch($accion)
{
case 'Agregar':
    $cantidad = $_REQUEST['cnt'];
    $codigo = $_REQUEST['cod'];
    $talla = $_REQUEST['talla'];
    if(!isset($_SESSION["CARRITO"]))
    {
        $producto = array(
            'ID'=>$codigo,
            'TALLA'=>$talla,
            'CANTIDAD'=>$cantidad
        );
        $_SESSION['CARRITO'][0]=$producto;
    }
    else{
        $cont = false;
        foreach ($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['ID'] == $codigo && $producto['TALLA']==$talla){
                $produc = $_SESSION['CARRITO'][$indice];
                $id = $produc['ID'];
                $talla1 = $produc['TALLA'];
                $can = $produc['CANTIDAD'] + $cantidad;
                $_SESSION['CARRITO'][$indice] = array(
                    'ID'=>$id,
                    'TALLA'=>$talla1,
                    'CANTIDAD'=>$can
                );
                $cont = true;
            }
        }
        if(!$cont){
        $numero = count($_SESSION['CARRITO']);
        $producto = array(
            'ID'=>$codigo,
            'TALLA'=>$talla,
            'CANTIDAD'=>$cantidad
        );
        $_SESSION['CARRITO'][$numero] = $producto;
        }
    }
    header("location: ../vistas/MuestraCarrito.php");
    break;

case 'Eliminar':
    $codigo = $_REQUEST['cod'];
    $talla = $_REQUEST['talla'];
    foreach ($_SESSION['CARRITO'] as $indice=>$producto){
        if($producto['ID'] == $codigo && $producto['TALLA']==$talla){
            unset($_SESSION['CARRITO'][$indice]);
            header("location: ../vistas/MuestraCarrito.php");
        }
    }
    break;
}


