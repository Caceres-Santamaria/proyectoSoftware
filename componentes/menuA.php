
<script>
    
    function carrito(){
        location.href = "MuestraCarrito.php";
    }
</script>
<header class="header">
            <div class="menu-movil">
                <button class="menu-boton">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="logo-flamma">
                <a href="#home" class="logo">
                    <h1>flamma</h1>
                </a>
            </div>
            <nav class="menu">
                <ul class="menu-list">
                    <li class="list-item active"><a href="inicioA.php" class="home"><i class="fas fa-home"></i><span>HOME</span></a></li>
                    <li class="list-item"><a href="#"><span>Agregar</span></a>
                        <ul class="categorias">
                            <li class="has-sub cateoria"><a href="agregarCiudad.php"><span>Ciudades</span></a></li>
                            <li class="has-sub cateoria"><a href="agregarProducto.php"><span>Productos</span></a></li>
                            <li class="has-sub cateoria"><a href="agregarCupon.php"><span>Cupones</span></a></li>
                        </ul>
                    </li>
                    <li class="list-item"><a href="#"><span>Modificar & Eliminar</span></a>
                        <ul class="colecciones">
                        <li class="has-sub cateoria"><a href="modificarProducto.php"><span>Producto</span></a></li>
                        <li class="has-sub cateoria"><a href="modificarCupon.php"><span>Cupón</span></a></li>
                        <li class="has-sub cateoria"><a href="CatalogoAccesories.php"><span>...</span></a></li>
                        </ul>
                    </li>
                    <li class="list-item"><a href="masVendidos.php"><span>Más vendidos</span></a>
                    </li>
                    <li class="list-item"><a href="#"><span>Pedidos</span></a>
                    <ul class="colecciones">
                        <li class="has-sub cateoria"><a href="pedidos.php"><span>Pedidos no enviados</span></a></li>
                        <li class="has-sub cateoria"><a href="TodosPedidos.php"><span>Todos los pedidos</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>