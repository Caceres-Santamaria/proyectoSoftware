<?php
include "./Metodos.php";
$obj = new Metodos();
extract($_POST);
$id = $_REQUEST['id'];
if ($snombre == "") {
    $snombre = NULL;
}
if ($sapellido == "") {
    $sapellido = null;
}
$sql1 = "insert into cliente (identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, direccion, telefono,fecha_nacimiento, sexo,id_ciudad) values ('$cedula','$pnombre', '$snombre','$papellido','$sapellido','$email','$direccion','$telefono','$fecha','$sexo','$ciudad')";
switch ($id) {
    case '1':
        $sql2 = "insert into usuario (usuario,contraseña,id_tipo_usuario,id_cliente) values ('$usuario','$contraseña','02','$cedula')";
        $obj->Actualizar($sql1);
        $obj->Actualizar($sql2);
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("location: ../vistas/inicio.php");
        break;
    case '2':
        $sql2 = "insert into usuario (usuario,contraseña,id_tipo_usuario,id_cliente) values ('$usuario','$contraseña','$tipo','$cedula')";
        $obj->Actualizar($sql1);
        $obj->Actualizar($sql2);
        header("location: ../vistasA/crearCuenta.php?ok=1");
}
