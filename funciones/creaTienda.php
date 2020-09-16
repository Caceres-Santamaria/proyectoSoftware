<?php
session_start();

include './Metodos.php';
$objMetodo = new Metodos();
$ListaCategoria = $objMetodo->categoria();
foreach ($ListaCategoria as $reg) {
    if(!isset($_SESSION[''.$reg[1].''])){
        unset($_SESSION[''.$reg[1].'']);
        $_SESSION[''.$reg[1].''] = $objMetodo->categoriaProducto($reg[0]);
    }
}
$ListaColeccion = $objMetodo->coleccion();
foreach ($ListaColeccion as $reg) {
    if(!isset($_SESSION[''.$reg[1].''])){
        unset($_SESSION[''.$reg[1].'']);
        $_SESSION[''.$reg[1].''] = $objMetodo->coleccionProducto($reg[0]);
    }
}
if(!isset($_SESSION['imagenes']))
{
    $images = array();
    $productos = $objMetodo->getProductos();
    foreach($productos as $row)
    {
        $imagenes = $objMetodo->getImagenes($row[0]);
        array_push($images,array(
            'ID'=>$row[0],
            'IMAGES'=>$imagenes
        ));
    }
    $_SESSION['imagenes'] = $images;
}
/*
foreach($_SESSION['imagenes'] as $producto)
{
    //echo $indice.'<br>';
    echo $producto['ID'].'<br>';
    echo var_dump($producto['IMAGES']).'<br>';
    echo '<br>';
}*/
/*
unset($_SESSION['tshirt_tops']);
unset($_SESSION['pants_shorts']);
unset($_SESSION['accesories']);
unset($_SESSION['bucket_balaclava']);
unset($_SESSION['hoodies']);
unset($_SESSION['nuevos']);
unset($_SESSION['basicos']);
$objMetodo = new Metodos();
$tshirt_tops = $objMetodo->ListaTshirt_tops();
$pants_shorts = $objMetodo->ListaPants_shorts();
$accesories = $objMetodo->ListaAccesories();
$bucket_balaclava = $objMetodo->ListaBucket_balaclava();
$hoodies = $objMetodo->ListaHoodies();
$nuevos = $objMetodo->ListaNuevos();
$basicos = $objMetodo->ListaBasicos();

$_SESSION['tshirt_tops'] = $tshirt_tops;
$_SESSION['pants_shorts'] = $pants_shorts;
$_SESSION['accesories'] = $accesories;
$_SESSION['bucket_balaclava'] = $bucket_balaclava;
$_SESSION['hoodies'] = $hoodies;
$_SESSION['nuevos'] = $nuevos;
$_SESSION['basicos'] = $basicos;
*/
header("location: ../vistas/flamma.php");
?>
