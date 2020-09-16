<?PHP
 if(isset($_SESSION['usuario']))
{
if(isset($_SESSION['tiempo'])){
    $inactivo = 15; //15 segundos de inactividad
    $vida_session = time() - $_SESSION['tiempo'];
    if($vida_session > $inactivo){
        session_unset();//removemos la sesión
        session_destroy();//destruimos la sesión
        header("location:../index.php");//redirigimos al index
        exit();
    }else{
       $_SESSION['tiempo'] = time (); //si no ha caudado, actualizamos 
    }   
}
else{
    $_SESSION['tiempo'] = time(); //activamos sesión tiempo

}
}
?>


<nav class="navbar  navbar-dark bg-dark navbar-expand-lg">
    <a class="navbar-brand align-self-center" href="../vistasC/inicio.php">
        <img src="../static/imagenes/logo.png" width="160" height="50" class="d-inline-block align-center" alt="">
        FLOR DE MARTE
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item active">
        <a class="nav-link" href="../vistasC/inicio.php"><img src="../static/icons/icons/casab.png" alt="" width="30" height="30" title="Cuenta" class="d-inline-block align-center"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../vistasC/pedidos.php">PEDIDOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../vistasC/masVendidos.php">MÁS VENDIDOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../vistasC/compras.php">COMPRAS</a>
      </li>
      
      <?php
            if (isset($_SESSION["usuario"])) {
                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo '<img src="../static/icons/icons/usuario.png" alt="" width="30" height="30" title="Cuenta">';
                echo '</a>';
                echo '<div class="dropdown-menu " aria-labelledby="navbarDropdown">';
                echo '<a class="dropdown-item item-usu" href=""><img class="UsuarioN" src="../static/icons/icons/usuario.png" alt="" width="20" height="20" title="Usuario">  '.$_SESSION["usuario"].'</a>';
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item item-usu" href="../vistas/VerDatos.php"><img class="misDatos" src="../static/icons/icons/vision.png" alt="" width="20px" height="20px" title="Ver Datos">  Mis Datos</a>';       
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item item-usu" href="../vistas/ActualizarDatos.php"><img class="AcDatos" src="../static/icons/icons/actualizar.png" alt="" width="20" height="20" title="Actualizar Datos">  Actualizar Datos</a>';
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item item-usu" href="../funciones/CerrarSesion.php"><img class="Cerrar" src="../static/icons/icons/cerrar-sesion.png" alt="" width="20" height="20" title="Ver pedidos">   Cerrar sesión</a>';
                echo '</div>';
                echo '</li>';
            } 
        else{
            echo '<li class="nav-item usuario">';
            echo '<a class="nav-link usu" href="../vistas/login.php">';
            echo '<img src="../static/icons/icons/usuario.png" alt="" width="30" height="30" title="Cuenta">';
            echo '</a>';
            echo '</li>';
          }
            ?>
    </ul>
  </div>
</nav>