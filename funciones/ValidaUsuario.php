<?php
include './Metodos.php';
session_start();
unset($_SESSION['usuario']);
extract($_POST);
$objMetodo = new Metodos();
$list = $objMetodo->CuentaUsuario($usuario);
foreach ($list as $row){
    $cont = $row[0];
}
if($cont == 0){
    header("location: ../vistas/login.php?cont=0");
}
else
{
    $lista = $objMetodo->getUsuario($usuario);
    foreach ($lista as $row){
        $pass = $row[1];
        $tipo = $row[2];
    }
    if($password == $pass){
        $_SESSION['usuario'] = $usuario;
        switch($tipo){
            case '01':
                header("location: ../vistasA/inicio.php");
            break;
            case '02':
                header("location: ../vistas/inicio.php");
            break;
            case '03':
                header("location: ../vistasC/inicio.php");
            break;
        }  
    }
    else{
        header("location: ../vistas/login.php?cont=1");
    }
}

