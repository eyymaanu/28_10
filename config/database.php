<?php
// config.php


function conectar() {
$host='autorack.proxy.rlwy.net';
$user='root';
$pass='HIHSjTtbRDwvIzJYOCqivjoGtlDxjqZr';
$database='estructurasdatos';
$port=21834;

    $mysqli = new mysqli($host, $user, $pass,$database ,$port);
    
    if ($mysqli->connect_error) {
        // Muestra un mensaje de error detallado con la descripción y el código del error.
        die('Hubo un error de conexión: ' . $mysqli->connect_error . ' (Código: ' . $mysqli->connect_errno . ')');
    }
    
    return $mysqli;
}

