<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructura de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>

        <?php include_once "./views/navbar.php";?>
    </header>
    <div class="overlay"></div>

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white">Estructuras de Datos</h1>
        <div class="row">
            <?php
            // Ejemplo de contenido; en producción puedes extraer estos datos de tu base de datos
            $contenido = [
                ['titulo' => 'Arrays', 'descripcion' => 'Conceptos y uso de arrays.', 'tipo' => 'Array'],
                ['titulo' => 'Pilas', 'descripcion' => 'Estructura de datos LIFO.', 'tipo' => 'Pila'],
                ['titulo' => 'Colas', 'descripcion' => 'Estructura de datos FIFO.', 'tipo' => 'Cola'],
                ['titulo' => 'Listas Enlazadas', 'descripcion' => 'Estructura dinámica de nodos.', 'tipo' => 'Lista'],
                ['titulo' => 'Grafos', 'descripcion' => 'Representación de grafos y sus algoritmos.', 'tipo' => 'Grafo'],
                ['titulo' => 'Árboles', 'descripcion' => 'Estructuras jerárquicas.', 'tipo' => 'Árbol'],
                ['titulo' => 'Ordenación', 'descripcion' => 'Algoritmos de ordenación.', 'tipo' => 'Ordenación']
            ];

            foreach ($contenido as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['titulo']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($item['descripcion']); ?></p>
                            <a href="contenido.php?tipo=<?= urlencode($item['tipo']); ?>" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>