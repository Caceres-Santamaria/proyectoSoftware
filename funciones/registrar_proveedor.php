<?PHP
 extract($_POST); 
 include "../funciones/Metodos.php"; 
 $obj = new Metodos();
 $sql3="insert into proveedor(identificacion,nombre,pagina_web,email,direccion,telefono,entidad_bancaria,nro_cuenta,id_ciudad) values ('$id','$nombre','$pagweb' ,'$email','$direccion','$telefono','$ebancaria','$nrocuenta','$combo1')";
 $obj->Actualizar($sql3);	
 header("location: ../vistasA/modificarProveedor.php");	
?>

