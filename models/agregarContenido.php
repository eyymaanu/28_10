<?php
include_once '../config/database.php';

function agregarDatos($titulo, $descripcion, $tipo, $archivo) {
    $conn = conectar();
    
    // Preparar la consulta SQL
    $sql = "INSERT INTO contenido (titulo, descripcion, tipo, archivo) VALUES (?, ?, ?, ?)";
    $sentencia = $conn->prepare($sql);

    if (!$sentencia) {
        // Manejo de error si la preparación falla
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $sentencia->bind_param('ssss', $titulo, $descripcion, $tipo, $archivo);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($sentencia->execute()) {
        // Cerrar la sentencia y la conexión
        $sentencia->close();
        $conn->close();
        return true; // Inserción exitosa
    } else {
        // Manejo de error si la ejecución falla
        echo "Error en la ejecución: " . $sentencia->error;
        $sentencia->close();
        $conn->close();
        return false; // Inserción fallida
    }
}
