<?php
// eliminarContenido.php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica que se haya enviado un ID válido
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);  // Convertir a entero para evitar inyecciones SQL

        try {
            $conn = conectar();

            // Primero, selecciona el archivo actual para eliminarlo del servidor si existe
            $query = "SELECT archivo FROM contenido WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $archivo = $row['archivo'];

                // Si el archivo existe en la carpeta de uploads, elimínalo
                if (!empty($archivo) && file_exists("../uploads/$archivo")) {
                    unlink("../uploads/$archivo");
                }

                // Ahora elimina el registro de la base de datos
                $query = "DELETE FROM contenido WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "Contenido eliminado exitosamente.";
                } else {
                    echo "Error al eliminar el contenido.";
                }
            } else {
                echo "Contenido no encontrado.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn->close();
        }
    } else {
        echo "ID de contenido no válido.";
    }
} else {
    echo "Método no permitido.";
}
