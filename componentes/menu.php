<script>
    function carrito() {
        location.href = "MuestraCarrito.php";
    }
</script>
<header class="header">
    
    <div class="logo-flamma">
        <a href="#home" class="logo">
            <h1>flamma</h1>
        </a>
    </div>
    <div class="iconos">
        <button class="carrito" type="button" onclick="carrito()">
        <i class="fas fa-shopping-cart"></i>
        </button>

        <button class="usuario"><a href="../funciones/CerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </button>

    </div>
    <nav class="menu">
        <ul class="menu-list">
            <li class="list-item active"><a href="inicio.php" class="home"><i class="fas fa-home"></i><span>HOME</span></a></li>
            <li class="list-item"><a href="#"><span>Productos</span></a>
                <ul class="categorias">
                    <?php
                        $categorias = $objMetodo->categoria();
                        foreach ($categorias as $reg)
                        {
                            echo '<li class="has-sub cateoria"><a href="Catalogo.php?clasificacion='.$reg[0].'"><span>'.$reg[1].'</span></a></li>';
                        }
                    ?>
                </ul>
            </li>
            <li class="list-item"><a href="#"><span>Colecciones</span></a>
                <ul class="colecciones">
                <?php
                    $coleccion = $objMetodo->coleccion();
                    foreach ($coleccion as $reg)
                    {
                        echo '<li class="has-sub coleccion"><a href="Catalogo.php?clasificacion='.$reg[0].'"><span>'.$reg[1].'</span></a></li>';
                    }
                    ?>
                </ul>
            </li>
            <li class="list-item last"><a href="nosotros.php"><span>About us</span></a></li>
        </ul>
    </nav>
</header>