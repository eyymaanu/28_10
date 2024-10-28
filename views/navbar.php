<!-- navbar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-lg-none" href="#">Estructuras de Datos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <a class="navbar-brand d-none d-lg-block " href="#">Estructuras de Datos</a>
                <ul class="navbar-nav w-50 justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="arrays.php">Arrays</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pilas.php">Pilas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="colas.php">Colas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listas.php">Listas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="grafos.php">Grafos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="arboles.php">Árboles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ordenacion.php">Ordenación</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
