<?php
include '../funciones/Metodos.php';
$objMetodo = new Metodos();
$id = $_REQUEST['id'];

if($_POST['codigo'] != 0)
{
    $costo = $objMetodo->costoEnvio($_POST['codigo']);
    if($id == 0){
        echo "$ ".number_format($costo,1);
    }
    elseif($id == 1)
    {
        $subtotal = $_POST['subtotal'];
        $cupon = $_POST['cupon'];
        if($cupon == "")
        {
            $total = $subtotal + $costo;
        }
        else
        {
            $valor = $objMetodo->getDescuento($cupon);
            $descuento = $subtotal*$valor;
            $total = $subtotal + $costo - $descuento;
        }
        echo "$ ".number_format($total,1);
    }
    elseif($id == 2)
    {
        $subtotal = $_POST['subtotal'];
        $cupon = $_POST['cupon'];
        if($cupon == "")
        {
            $total = $subtotal + $costo;
        }
        else
        {
            $cont = $objMetodo->contCupon($cupon);
            if($cont==1)
            {
                $valor = $objMetodo->getDescuento($cupon);
                $descuento = $subtotal*$valor;
                $total = $subtotal + $costo - $descuento;
            }
            else
            {
                $total = $subtotal + $costo;
            }
        }
        echo "$ ".number_format($total,1);
    }
}
elseif($id == 0)
{
    $costo = 0;
    echo "$ ".number_format($costo,1);
}
elseif($id==1)
{
    $subtotal = $_POST['subtotal'];
    //echo "$ ".number_format($subtotal,1);
    $cupon = $_POST['cupon'];
        if($cupon == "")
        {
            $total = $subtotal;
        }
        else
        {
            $valor = $objMetodo->getDescuento($cupon);
            $descuento = $subtotal*$valor;
            $total = $subtotal  - $descuento;
        }
        echo "$ ".number_format($total,1);
}
elseif($id == 2)
{
    $subtotal = $_POST['subtotal'];
    $cupon = $_POST['cupon'];
    if($cupon == "")
    {
        $total = $subtotal;
    }
    else
    {
        $cont = $objMetodo->contCupon($cupon);
        if($cont==1)
        {
            $valor = $objMetodo->getDescuento($cupon);
            $descuento = $subtotal*$valor;
            $total = $subtotal - $descuento;
        }
        else
        {
            $total = $subtotal;
        }
    }
    echo "$ ".number_format($total,1);
}
elseif($id==3)
{
    $cupon = $_POST['cupon'];
    $subtotal = $_POST['subtotal'];
    $cont = $objMetodo->contCupon($cupon);
    if($cont==0)
    {
        echo "$ ".number_format(0,1);
    }
    else
    {
        $valor = $objMetodo->getDescuento($cupon);
        $sub = $subtotal*$valor;
        echo "$ -".number_format($sub,1);
    }
}
elseif($id==4)
{
    $departamento = $_POST['departamento'];
    if($departamento == 0)
    {
        echo "<option value='0'>---</option>";
    }
    else
    {
        $listaCiudad = $objMetodo->getCiudadDepartamento($departamento);
        echo "<option value='0'>---</option>";
        foreach ($listaCiudad as $row) {
            echo '<option value=' . $row[0] . '>' . $row[2] . '</option>';
        }
    }
}
elseif($id==5)
{
    $cupon = $_POST['cupon'];
    $cont = $objMetodo->contCupon($cupon);
    if($cont==1)
    {
        echo $cupon;
    }
    else
    {
        echo "";
    }
}
?>