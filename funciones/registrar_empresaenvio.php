<?PHP
 extract($_POST); 
 include "../funciones/Metodos.php"; 
 $obj = new Metodos();
 $sql3="insert into empresa_envio (id_empresa_envio, nombre, email, direccion,telefono, pagina_web) values ('$id','$nombre', '$email','$direccion','$telefono','$paginaweb')";
 $obj->Actualizar($sql3);	
 header("location: ../vistasA/modificarEmpresa.php");

?>