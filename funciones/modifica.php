<?PHP
include "../funciones/Metodos.php";
$obj = new Metodos();
extract($_POST);
switch ($cod)
{
    case 1: 
        $sapellido="".$sapellido;
        $snombre="".$snombre;
        $sql="update cliente SET primer_nombre='$pnombre', segundo_nombre='$snombre' , primer_apellido='$papellido', segundo_apellido='$sapellido', telefono=$telefono, direccion='$direccion', email='$email', fecha_nacimiento='$fecha', sexo='$sexo', id_ciudad='$ciudad' where identificacion=$cedula";                
    break;
    case 2:
        $id=$id."";
        $email="".$email;
        $nroseugimiento="".$paginaweb;
        $sql="update empresa_envio SET nombre='$nombre', telefono=$telefono, direccion='$direccion', email='$email', pagina_web='$paginaweb' where id_empresa_envio='".$id."'";                
        break;
    case 3:
        $nroseg="".$nroseg;
        $sql="update pedido SET  nro_seguimiento='$nroseg', id_empresa_envio='$empresaenvio', id_estado='$estado' where id_pedido=$pedidoId";
        break;
    case 4:
        $sql="update producto SET nombre='$nombre', existencia=$existencia, descripcion='$descripcion', valor_venta=$valorventa, imagen='$imagen' , id_subcategoria='$subcategoria', id_tipo_producto='$tipo', segunda_imagen = '$simagen' where id_producto='".$idprod."'";
        break;
    case 5:
        $email="".$email;
        $direccion="".$direccion;
        $pagweb="".$pagweb;
        $nrocuenta="".$nrocuenta;
        $ebancaria="".$ebancaria;
        $sql="update proveedor SET nombre='$nombre', email='$email', direccion='$direccion', telefono=$telefono, id_ciudad='$ciudad', pagina_web='$pagweb', nro_cuenta='$nrocuenta', entidad_bancaria='$ebancaria' where identificacion=$id";
        break;
}

$obj->Actualizar($sql);
header("location: ../vistasA/$pagina");  

?>