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
        $query = "select b.referencia,b.nombre,(select sum(existencia) from talla_producto as a where a.referencia=b.referencia) as existencia,b.descripcion,b.costo,b.categoria,b.coleccion from producto as b where b.categoria =".$codigo." order by b.nombre asc;";
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
        $query = "select b.referencia,b.nombre,(select sum(existencia) from talla_producto as a where a.referencia=b.referencia) as existencia,b.descripcion,b.costo,b.categoria,b.coleccion from producto as b where b.coleccion =".$codigo." order by b.nombre asc;";
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
        foreach($list as $row)
        {
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
        foreach($list as $row)
        {
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
        foreach($list as $row)
        {
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

    public function getImagenProducto($cod,$array)
    {
        $images = array();
        foreach($array as $producto)
        {
            if($cod == $producto['ID'])
            {
                $images = $producto['IMAGES'];
            }
        }
        return $images;
    }






    public function ListarProductosCod($cod)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre,descripcion,valor_venta,imagen,segunda_imagen,existencia from producto where id_producto ='" . $cod . "'";
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
        $query = "select * from producto where id_producto = '" . $cod . "'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function getCiudad($codc)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select * from ciudad where id_ciudad = '" . $codc . "'";
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
        $query = "select * from ciudad order by id_ciudad";
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
        $query = "select costo from domicilio where id_ciudad = '$ciu'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $costo = $row[0];
        }
        return $costo;
    }
    public function idDomi($ciud)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select id_domicilio from domicilio where id_ciudad = '" . $ciud . "'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $id_domi = $row[0];
        }
        return $id_domi;
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
    public function InsertPedido($cant, $direccion, $descripcion, $idDomi, $codigo, $persona, $telefono)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "insert into pedido values('$cant','$direccion',now(),'$descripcion','$idDomi','$codigo','Sin seguimiento','3','01','$persona','$telefono',current_date)";
        $conn->query($query);
    }
    public function InsertDetalle($idP, $codP, $cant, $valor)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "insert into pedido_producto values ('$idP','$codP','$cant','$valor')";
        $conn->query($query);
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
    public function Actualizar($sql)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = $sql;
        $conn->query($query);
    }
    public function getEmpresa($id)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select nombre from empresa_envio where id_empresa_envio = '" . $id . "'";
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        foreach ($list as $row) {
            $nombre = $row[0];
        }
        return $nombre;
    }
    public function ConProveedor()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.identificacion, a.nombre,a.email, a.direccion, a.telefono,(select nombre from ciudad where id_ciudad = a.id_ciudad) as ciu, a.pagina_web, a.nro_cuenta, a.entidad_bancaria from proveedor as a";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
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
    public function ConProducto()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.id_producto, a.nombre,a.existencia, a.descripcion, a.valor_venta, a.imagen,(select nombre from subcategoria_producto where id_subcategoria = a.id_subcategoria) as sub,(select nombre from tipo_producto where id_tipo_producto = a.id_tipo_producto) as tipo from producto as a FETCH FIRST 40 ROWS ONLY";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConProductoT($cat)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.id_producto, a.nombre,a.existencia, a.descripcion, a.valor_venta, a.imagen,(select nombre from subcategoria_producto where id_subcategoria = a.id_subcategoria) as sub,(select nombre from tipo_producto where id_tipo_producto = a.id_tipo_producto) as tipo from producto as a where a.id_subcategoria = '$cat'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConProductoC($cat)
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.id_producto, a.nombre,a.existencia, a.descripcion, a.valor_venta, a.imagen,(select nombre from subcategoria_producto where id_subcategoria = a.id_subcategoria) as sub,(select nombre from tipo_producto where id_tipo_producto = a.id_tipo_producto) as tipo from producto as a where a.id_tipo_producto = '" . $cat . "'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
    public function ConEmpresaEnvio()
    {
        $cnx = new conexionDB();
        $conn = $cnx->getConexion();
        $query = "select a.id_empresa_envio, a.nombre,a.direccion, a.telefono,a.email, a.pagina_web from empresa_envio as a";
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
        $query = "select a.id_pedido,a.direccion, a.hora,a.descripcion, (select costo from domicilio where a.id_domicilio=id_domicilio) as domi,(select primer_nombre ||' '||primer_apellido from cliente where a.id_cliente=identificacion) as cliente, a.nro_seguimiento, (select nombre from empresa_envio where a.id_empresa_envio=id_empresa_envio) as empresa_envio, (select nombre from estado_pedido where a.id_estado=id_estado) as estado,a.persona,a.telefono,a.fecha from pedido as a where a.id_estado = '01'";
        $list = [];
        foreach ($conn->query($query) as $row) {
            $list[] = $row;
        }
        return $list;
    }
}
