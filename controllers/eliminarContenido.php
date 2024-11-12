<?php
require_once '../config/database.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $conn = conectar();

    // Preparamos la consulta para eliminar el contenido de la base de datos
    $query = "DELETE FROM contenido WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // El contenido se eliminó con éxito
        echo "Contenido eliminado correctamente";
    } else {
        // Hubo un error al eliminar
        echo "Error al eliminar contenido";
    }

    $stmt->close();
    $conn->close();

    // Redirigir al usuario a la página principal del administrador o actualizar la vista
    header("Location: ../views/vistaAdmin.php");
    exit;
}

