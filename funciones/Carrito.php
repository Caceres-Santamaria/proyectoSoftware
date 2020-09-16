<?php
session_start();

$accion = $_REQUEST['acc'];

switch($accion)
{
case 'Agregar':
    $cantidad = $_REQUEST['cnt'];
    $codigo = $_REQUEST['cod'];
    if(!isset($_SESSION["CARRITO"]))
    {
        $producto = array(
            'ID'=>$codigo,
            'CANTIDAD'=>$cantidad
        );
        $_SESSION['CARRITO'][0]=$producto;
    }
    else{
        $cont = false;
        foreach ($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['ID'] == $codigo){
                $produc = $_SESSION['CARRITO'][$indice];
                $id = $produc['ID'];
                $can = $produc['CANTIDAD'] + $cantidad;
                $_SESSION['CARRITO'][$indice] = array(
                    'ID'=>$id,
                    'CANTIDAD'=>$can
                );
                $cont = true;
            }
        }
        if(!$cont){
        $numero = count($_SESSION['CARRITO']);
        $producto = array(
            'ID'=>$codigo,
            'CANTIDAD'=>$cantidad
        );
        $_SESSION['CARRITO'][$numero] = $producto;
        }
    }
    header("location: ../vistas/MuestraCarrito.php");
    break;

case 'Eliminar':
    $codigo = $_REQUEST['cod'];
    foreach ($_SESSION['CARRITO'] as $indice=>$producto){
        if($producto['ID'] == $codigo){
            unset($_SESSION['CARRITO'][$indice]);
            header("location: ../vistas/MuestraCarrito.php");
        }
    }
    break;
}


