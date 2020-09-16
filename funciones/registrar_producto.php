<?PHP
 extract($_POST); 
 include "../funciones/Metodos.php"; 
 $obj = new Metodos();
 $sql3="insert into producto(id_producto,nombre,imagen,descripcion,valor_venta,existencia,id_tipo_producto,id_subcategoria) values ('$idprod','$nombre','$imagen', '$descripcion','$valorventa','$existencia','$combo1','$combo2')";
 $obj->Actualizar($sql3);	
 header("location: ../vistasA/modificarProducto.php");	
?>