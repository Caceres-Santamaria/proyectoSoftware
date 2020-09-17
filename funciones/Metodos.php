<?php

include "../funciones/conexionDB.php";
class Metodos
{
    public function clasificacion()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select id_clasificacion,nombre from clasificacion";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function categoria()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.id_categoria,b.nombre,b.imagen from clasificacion as b inner join categoria as a on a.id_categoria=b.id_clasficacion";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function coleccion()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.id_coleccion,b.nombre,b.imagen,a.fecha from clasificacion as b inner join coleccion as a on a.id_coleccion=b.id_clasficacion";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function categoriaProducto($codigo)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select b.referencia,b.nombre,(select sum(existencia) from talla_producto as a where a.referencia=b.referencia) as existencia,b.descripcion,b.costo,b.categoria,b.coleccion from producto as b where b.categoria =" . $codigo . " order by b.nombre asc;";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function coleccionProducto($codigo)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select b.referencia,b.nombre,(select sum(existencia) from talla_producto as a where a.referencia=b.referencia) as existencia,b.descripcion,b.costo,b.categoria,b.coleccion from producto as b where b.coleccion =" . $codigo . " order by b.nombre asc;";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getNombreClasificacion($codigo)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre from clasificacion where id_clasficacion='$codigo'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $nombre = $row[0];
        }
        return $nombre;
    }
    public function countColeccion($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select count(*) from coleccion where id_coleccion = $cod";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $count = $row[0];
        }
        return $count;
    }
    public function countCategoria($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select count(*) from categoria where id_categoria = $cod";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $count = $row[0];
        }
        return $count;
    }
    public function getProductos()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select referencia from producto";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getImagenes($prod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre from imagen_producto where producto= '$prod'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row[0];
        }
        return $list;
    }
    public function getImagenProducto($cod, $array)
    {
        $images = array();
        foreach ($array as $producto) {
            if ($cod == $producto['ID']) {
                $images = $producto['IMAGES'];
            }
        }
        return $images;
    }
    public function ListarProductosCod($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre,descripcion,costo from producto where referencia ='" . $cod . "'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }

    public function getTallas($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select t.id_talla,t.nombre,tp.existencia from talla as t inner join talla_producto as tp on t.id_talla = tp.id_talla where tp.referencia = '$cod'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }

    public function getProducto($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from producto where referencia = '" . $cod . "'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getTalla($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre from talla where id_talla = ". $cod ."";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $talla = $row[0];
        }
        return $talla;
    }
    public function getCiudad($codc)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from ciudad where id_ciudad = " . $codc . "";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getDepartamento($codc)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from departamento where id_departamento = " . $codc . "";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getCiudadDepartamento($codc)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from ciudad where id_departamento = " . $codc . " order by nombre";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ListaCuidades()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from ciudad order by nombre";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ListaDepartamentos()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from departamento order by nombre";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function costoEnvio($ciu)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select costo from ciudad where id_ciudad = '$ciu'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $costo = $row[0];
        }
        return $costo;
    }
    public function contCupon($cup)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select count(*) from cupon where id_cupon = '$cup'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $costo = $row[0];
        }
        return $costo;
    }
    public function getDescuento($cup)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select valor from cupon where id_cupon = '$cup'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $costo = $row[0];
        }
        return $costo;
    }
    public function CuentaPedidos()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select count(*) from pedido";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $cant = $row[0];
        }
        return $cant;
    }
    public function InsertPedido($cant,$persona,$departamento,$ciudad,$direccion,$especificacion,$telefono,$descuento)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "insert into pedido values('$cant','$persona','$departamento','$ciudad','$direccion','$especificacion','$telefono','Sin seguimiento','no enviado','$descuento',current_date)";
        $conn->query($query);
    }
    public function InsertDetalle($idP, $codP, $talla, $cant, $valor)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "insert into detalle_pedido values ('$idP','$codP','$talla','$cant','$valor')";
        $conn->query($query);
    }
    public function Actualizar($sql)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = $sql;
        $conn->query($query);
    }
    public function Consulta($sql)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = $sql;
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConProductoCat($cat)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.referencia, a.nombre,a.costo, a.descripcion,(select c.nombre from categoria as d inner join clasificacion as c on id_clasficacion = d.id_categoria where id_categoria = a.categoria) as cat,(select e.nombre from coleccion as f inner join clasificacion as e on id_clasficacion = f.id_coleccion where id_coleccion = a.coleccion) as col from producto as a where a.categoria = '$cat'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConProductoCol($cat)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.referencia, a.nombre,a.costo, a.descripcion,(select c.nombre from categoria as d inner join clasificacion as c on id_clasficacion = d.id_categoria where id_categoria = a.categoria) as cat,(select e.nombre from coleccion as f inner join clasificacion as e on id_clasficacion = f.id_coleccion where id_coleccion = a.coleccion) as col from producto as a where a.coleccion = '$cat'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConProducto()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.referencia, a.nombre,a.costo, a.descripcion,(select c.nombre from categoria as d inner join clasificacion as c on id_clasficacion = d.id_categoria where id_categoria = a.categoria) as cat,(select e.nombre from coleccion as f inner join clasificacion as e on id_clasficacion = f.id_coleccion where id_coleccion = a.coleccion) as col from producto as a order by a.categoria LIMIT 15";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConPedido()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from pedido where estado = 'no enviado'";
        //"select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio, (select nombre from estado_pedido where a.id_estado=id_estado) as estado,a.persona,a.telefono,a.fecha from pedido as a where a.id_estado = '01'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function stock($ref)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select p.referencia,p.nombre,(select t.nombre from talla as t where t.id_talla=d.id_talla),d.existencia from producto as p inner join talla_producto as d on p.referencia = d.referencia where p.referencia='$ref' order by d.existencia asc";
        //"select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio, (select nombre from estado_pedido where a.id_estado=id_estado) as estado,a.persona,a.telefono,a.fecha from pedido as a where a.id_estado = '01'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function stock2()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select p.referencia,p.nombre,(select t.nombre from talla as t where t.id_talla=d.id_talla),d.existencia from producto as p inner join talla_producto as d on p.referencia = d.referencia order by d.existencia asc";
        //"select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio, (select nombre from estado_pedido where a.id_estado=id_estado) as estado,a.persona,a.telefono,a.fecha from pedido as a where a.id_estado = '01'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function imagen($ref)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select referencia,nombre from producto where referencia='$ref' order by referencia asc";
        //"select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio, (select nombre from estado_pedido where a.id_estado=id_estado) as estado,a.persona,a.telefono,a.fecha from pedido as a where a.id_estado = '01'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function imagen2()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select referencia,nombre from producto as p order by referencia asc";
        //"select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio, (select nombre from estado_pedido where a.id_estado=id_estado) as estado,a.persona,a.telefono,a.fecha from pedido as a where a.id_estado = '01'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }




    public function NumeroPedidos($codigo)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select count(*) from pedido where id_cliente = " . $codigo;
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $numero = $row[0];
        }
        return $numero;
    }
    public function getPedidos($codigo)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from pedido where id_cliente = " . $codigo . " order by id_pedido";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getNombreEstado($id)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre from estado_pedido where id_estado = '" . $id . "'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $nombre = $row[0];
        }
        return $nombre;
    }
    public function get_Ciudad($codc)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select (select c.nombre_ciudad from ciudad as c where c.id_ciudad = a.id_ciudad) from domicilio as a where a.id_domicilio = " . $codc;
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $ciudad = $row[0];
        }
        return $ciudad;
    }
    public function getDetalles($idPedido)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from pedido_producto where id_pedido = " . $idPedido;
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
}
