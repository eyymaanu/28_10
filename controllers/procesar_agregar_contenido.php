<?php
include_once '../models/agregarContenido.php'; // Asegúrate de incluir el modelo donde está la función agregarDatos

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los campos requeridos
    $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
    $tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
    $archivo = ''; // Inicializar la variable para el archivo

    // Validar que los campos no estén vacíos
    if (empty($titulo) || empty($descripcion) || empty($tipo)) {
        echo "Por favor, completa todos los campos requeridos.";
        return;
    }

    // Manejo de carga de archivos (opcional)
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['archivo']['name'];
        $rutaTemporal = $_FILES['archivo']['tmp_name'];
        $rutaDestino = '../uploads/' . basename($nombreArchivo); // Ruta de destino del archivo subido

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            // Guardar la ruta del archivo en la variable para almacenarlo en la base de datos
            $archivo = $rutaDestino; // Aquí guardamos la ruta completa del archivo
        } else {
            echo "Error al mover el archivo a la carpeta de destino.";
            return;
        }
    }

    // Llamar a la función agregarDatos, guardando solo el nombre del archivo en la base de datos
    if (agregarDatos($titulo, $descripcion, $tipo, $archivo)) {
        echo "Contenido agregado exitosamente.";
    } else {
        echo "Error al agregar el contenido.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
