<?php
// config.php

$host = 'localhost';
$dbname = 'estructurasDatos';
$username = 'root';
$password = '';


function conectar(){
    global $host, $dbname, $username, $password;
    $mysqli = new mysqli( $host, $dbname, $username, $password );
    if ($mysqli->connect_error) {
        die('Hubo un error de conexion'. $mysqli->connect_error);
} 
return $mysqli;

}