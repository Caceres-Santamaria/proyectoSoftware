<?PHP
 extract($_POST); 
include "../funciones/Metodos.php"; 
$obj = new Metodos();
 $sql3="insert into ciudad (id_ciudad, nombre_ciudad,id_departamento) values ('$id','$nombre','01')";
 $obj->Actualizar($sql3);
 $sql2= "select count(id_domicilio) from domicilio";
 $list = $obj->Consulta($sql2);
 foreach($list as $row){
     $cod = $row[0] + 1;
 }
 $sql = "insert into domicilio values('$cod','$costo','$id')";
 $obj->Actualizar($sql);	
header("location: ../vistasA/agregarCiudad.php");
?>
