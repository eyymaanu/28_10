<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructura de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<style>
body {

            background-image: linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(./images/fondo.png);
            background-position: center ;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
}

form{
            display: flex;
            justify-content: space-between;

}

.card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff9800;
        }

.card-text {
            color: #dcdcdc;
        }

@media (max-width: 768px) {
            .card-title {
                font-size: 1.25rem;
            }

            .card-text {
                font-size: 0.9rem;
            }
        }

@media (max-width: 576px) {
            .card-title {
                font-size: 1rem;
            }

            .card-text {
                font-size: 0.8rem;
            }
        }

</style>
</head>
<body>
    <header>

        <?php include_once "./views/navbar.php";?>
    </header>
    <div class="overlay"></div>
    <div class="container mt-5">
        <div class="row">
            <?php
            require_once './config/database.php';
            $conn = conectar();
            $query = "SELECT * FROM contenido";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            // Usamos un bucle para mostrar cada item en una card
             foreach ($result as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['titulo']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($item['descripcion']); ?></p>
                            <a href="contenido.php?id=<?= $item['id']; ?>" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>