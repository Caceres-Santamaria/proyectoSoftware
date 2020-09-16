<?php
include './Metodos.php';
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['CARRITO']);
session_destroy();
header("location: ../index.php");


