<?php
require_once '../config/middleware.php';
verificarUsu();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personalización de la barra de navegación */
        .navbar {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .navbar a {
            color: white;
        }
        .navbar a:hover {
            color: #ddd;
        }

        /* Fondo de pantalla */
        body {
            background-image: linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../images/fondo.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            min-width: 100vw;
        }

        /* Estilo de la tarjeta */
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include_once "./navbar.php"; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <h2 class="text-center mb-4">Agregar Nuevo Contenido</h2>
                    <form id="agregarContenidoForm">
                      
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript con Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
   document.getElementById('agregarContenidoForm').addEventListener('submit', function(event) {
     event.preventDefault();
     const formData = new FormData(this);
     fetch('../controllers/procesar_agregar_user.php', {
       method: 'POST',
       body: formData
     })
     .then(response => response.text())
     .then(data => {
       alert(data);
     })
     .catch(error => {
       console.error('Error:', error);
     });
   });


</script>
</body>
</html>

