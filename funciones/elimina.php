<?PHP
include "../funciones/Metodos.php";
$obj = new Metodos();
$id = $_REQUEST['id'];
$elemento = $_REQUEST['elemento'];
$pagina = $_REQUEST['pagina'];
switch ($elemento) {
    case 'cupon':
        $sql = "delete from cupon where id_cupon='$id'";
        break;
    case 'categoria':
        $sql = "delete from categoria where id_categoria=$id";
        break;
    case 'coleccion':
        $sql = "delete from coleccion where id_coleccion=$id";
        break;
    case 'producto':
        $sql = "delete from producto where referencia='" . $id . "'";
        break;
    case 'talla':
        $sql = "delete from talla where id_talla=$id";
        break;
}

$obj->Actualizar($sql);
header("location: ../VistasA/$pagina");

