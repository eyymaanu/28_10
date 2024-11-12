<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado para la barra de navegación */
        .navbar {
            background-color: rgba(255, 255, 255, 0.1); /* Fondo blanco con opacidad del 80% */
            backdrop-filter: blur(10px); /* Efecto de desenfoque detrás de la navbar */
        }
        a{
            color:white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand d-lg-none text-white"  href="#">Estructuras de Datos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <a class="navbar-brand text-white d-none d-lg-block" href="#">Estructuras de Datos</a>
                <ul class="navbar-nav w-50 justify-content-around">
                    <?php
                    if(isset($_SESSION['id'])){
                      echo'<li class="nav-item"><a class="nav-link text-white" href="vistaAdmin.php">Inicio</a></li>';
                    }else{
                        echo'<li class="nav-item"><a class="nav-link text-white" href="index.php">Inicio</a></li>';
                    }
                    ?>
                    
                    <li class="nav-item"><a class="nav-link text-white" href="arrays.php">Arrays</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="pilas.php">Pilas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="colas.php">Colas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="listas.php">Listas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="grafos.php">Grafos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="arboles.php">Árboles</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="ordenacion.php">Ordenación</a></li>
                </ul>
                <ul class="navbar-nav">
                  <?php
                  if(!isset($_SESSION['id'])){
                    
                      echo '<li class="nav-item "><a class="nav-link text-white" href="./views/login.php">Iniciar Sesión</a></li>';
                  }else{
                    echo"<form action='./login.php' method='post'>
                    <li class='nav-item '><input type='submit' class='nav-link text-white' name='logout' value='Cerrar Sesión'></li>
                    
                    </form>";
                   
                  }
                  ?>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Asegúrate de cargar Bootstrap JavaScript con Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
