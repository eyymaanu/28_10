<?php
// config.php


function conectar() {
    $mysqli = new mysqli('autorack.proxy.rlwy.net', 'root', 'HIHSjTtbRDwvIzJYOCqivjoGtlDxjqZr', 'estructurasdatos',21834);
    
    if ($mysqli->connect_error) {
        // Muestra un mensaje de error detallado con la descripción y el código del error.
        die('Hubo un error de conexión: ' . $mysqli->connect_error . ' (Código: ' . $mysqli->connect_errno . ')');
    }
    
    return $mysqli;
}

