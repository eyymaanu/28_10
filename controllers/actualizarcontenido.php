<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $archivo = $_POST['archivo_actual']; // Mantén el archivo actual por defecto

    // Manejo de carga de archivos
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $archivo = $_FILES['archivo']['name'];
        $rutaTemporal = $_FILES['archivo']['tmp_name'];
        $rutaDestino = '../uploads/' . $archivo;

        // Mover el archivo subido a la carpeta de destino
        if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
            echo "Error al subir el archivo.";
            return;
        }
    }

    // Actualizar los datos en la base de datos
    $conn = conectar();
    $sql = "UPDATE contenido SET titulo = ?, descripcion = ?, tipo = ?, archivo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $titulo, $descripcion, $tipo, $archivo, $id);

    if ($stmt->execute()) {
        echo "Contenido actualizado exitosamente.";
    } else {
        echo "Error al actualizar el contenido.";
    }

    $stmt->close();
    $conn->close();
}