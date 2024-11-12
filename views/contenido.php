<?php
// Contenido.php
require_once '../config/database.php';

if (isset($_GET['id'])) {
    $contenido_id = $_GET['id'];
    $conn = conectar();
    $query = "SELECT * FROM contenido WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $contenido_id);  
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $contenido = $result->fetch_assoc();
    } else {
        echo "Contenido no encontrado";
        exit;
    }
} else {
    echo "ID no especificado";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Contenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../images/fondo.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <header>
        <?php include_once "../views/navbar.php"; ?>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?= htmlspecialchars($contenido['titulo']); ?></h3>
                        <p class="card-text">Tipo de Dato: <?= nl2br(htmlspecialchars($contenido['tipo'])); ?></p>
                        <br>
                        <p class="card-text"><?= nl2br(htmlspecialchars($contenido['descripcion'])); ?></p>
                        

                        <?php if (!empty($contenido['archivo']) && file_exists("../uploads/" . $contenido['archivo'])): ?>
                            <!-- Mostrar botón de descarga si el archivo existe -->
                            <a href="../uploads/<?= htmlspecialchars($contenido['archivo']); ?>" class="btn btn-success" download>Descargar contenido</a>
                        <?php else: ?>
                            <!-- Si no hay archivo, mostrar un mensaje -->
                            <p>No hay archivo disponible para descargar.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
