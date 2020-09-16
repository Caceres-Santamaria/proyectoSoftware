<?PHP
include "Metodos.php";
extract($_POST);
$obj= new Metodos();
$sql="update cliente SET primer_nombre='$pnombre', segundo_nombre='$snombre' , primer_apellido='$papellido', segundo_apellido='$sapellido', telefono=$telefono, direccion='$direccion', email='$email', fecha_nacimiento='$fecha', sexo='$sexo', id_ciudad='$ciudad' where identificacion=$cedula";                
$obj->Actualizar($sql);
header("location:../vistas/VerDatos.php");
