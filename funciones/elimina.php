<?PHP
include "../funciones/Metodos.php";
$obj = new Metodos();
$id = $_REQUEST['id'];
$pagina = $_REQUEST['pagina'];
$cod = $_REQUEST['cod'];
switch ($cod) {
    case 1:
        $sql = "delete from cliente where identificacion=$id";
        break;
    case 2:
        $id = $id . "";
        $sql = "delete from empresa_envio where id_empresa_envio='" . $id . "'";
        break;
    case 3:
        $sql = "delete from pedido where id_pedido=$id";
        break;
    case 4:
        $sql = "delete from producto where id_producto='" . $id . "'";
        break;
    case 5:
        $sql = "delete from proveedor where identificacion=$id";
        break;
}

$obj->Actualizar($sql);
header("location: ../vistasA/$pagina");

