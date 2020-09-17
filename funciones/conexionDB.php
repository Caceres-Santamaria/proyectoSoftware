<?php

/**
 * Description of conexionDB
 *
 * @author Jenny Santamaría & Alexis Cáceres
 */
class conexionDB {
public function getConexion(){
    /* Conectar a una base de datos de MySQL invocando al controlador */
    $dsn = 'mysql:dbname=flamma;host=127.0.0.1';
    $usuario = 'flamma';
    $contraseña = 'flamma2020';
    //$dsn = 'mysql:dbname=flamma;host=127.0.0.1';
    //$usuario = 'root';
    //$contraseña = '123456';
    try {
        $conn = new PDO($dsn, $usuario, $contraseña);
        return $conn;
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
		echo "<br/>no se está realizando la conexionDB<br/>";
		echo "Failed: " . $exc->getMessage();
        return FALSE;
    }
    }
}
?>