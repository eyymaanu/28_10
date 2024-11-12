<?php
require_once '../config/middleware.php';
verificarUsu();
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../index.php');
}
// Aquí va el contenido de vistaAdmin.php si la sesión está activa
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <style>
        body {

background-image: linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../images/fondo.png);
background-position: center ;
background-repeat: no-repeat;
background-size: cover;
min-height: 100vh;
}
form{
    display: flex;
    justify-content: space-between;

}
    </style>
</head>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <?php
            require_once '../config/database.php';
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
                            <form id="eliminarForm<?= $item['id']; ?>" action="../controllers/eliminarContenido.php" method="POST">
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" 
            data-bs-target="#editarModal"
            onclick="cargarDatos('<?= $item['id']; ?>', '<?= htmlspecialchars($item['titulo']); ?>', '<?= htmlspecialchars($item['descripcion']); ?>', '<?= htmlspecialchars($item['tipo']); ?>', '<?= htmlspecialchars($item['archivo']); ?>')">Editar</button>
    <button type="submit" class="btn btn-danger" name="eliminar" value="eliminar">Eliminar</button>
    <input type="hidden" name="id" value="<?= $item['id']; ?>">
</form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
            
            <!-- Card para agregar nuevo contenido -->
            <div class="col-md-4 mb-4">
                <a href="./agregarCard.php" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center">Agregar Card</h5>
                            <p class="card-text text-center">Haciendo clic aquí puedes agregar Cards para tener más contenido disponible</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="./register.php" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title text-center">Registrar Usuario</h5>
                            <p class="card-text text-center">Haciendo clic aquí puedes Registrar un nuevo usuario</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div><!-- Modal para editar contenido -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Contenido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditar" method="POST" action="../controllers/actualizarContenido.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="contenidoId" value="">
                    <input type="hidden" name="archivo_actual" value="<?= htmlspecialchars($item['archivo']); ?>"> <!-- Valor del archivo actual -->

                    <!-- Fila Superior -->
                    <div class="row mb-4">
                        <div class="col">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="col">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select id="tipo" name="tipo" class="form-select" required>
                                <option value="" disabled selected>Seleccione un tipo</option>
                                <option value="Array">Array</option>
                                <option value="Pila">Pila</option>
                                <option value="Cola">Cola</option>
                                <option value="Lista">Lista</option>
                                <option value="Grafo">Grafo</option>
                                <option value="Árbol">Árbol</option>
                                <option value="Ordenación">Ordenación</option>
                            </select>
                        </div>
                         <div class="col">
                            <label class="form-label">Archivo actual:</label><br>
                            <a href="../uploads/<?= htmlspecialchars($item['archivo']); ?>" target="_blank" class="link-primary">Descargar archivo</a>
                        </div>
                    </div>

                    <!-- Fila Inferior -->
                    <div class="row mb-4">
                        <div class="col">
                            <label for="nuevoArchivo" class="form-label">Cargar nuevo archivo (opcional)</label>
                            <input type="file" class="form-control" id="nuevoArchivo" name="archivo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-3">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function cargarDatos(id, titulo, descripcion, tipo, archivo) {
    document.getElementById('contenidoId').value = id;
    document.getElementById('titulo').value = titulo;
    document.getElementById('descripcion').value = descripcion;
    document.getElementById('tipo').value = tipo;

    // Configura el enlace para descargar el archivo existente
    if (archivo) {
        document.getElementById('archivoActual').href = '../uploads/' + archivo; // Ajusta la ruta según tu estructura
        document.getElementById('archivoActual').style.display = 'block'; // Muestra el enlace
    } else {
        document.getElementById('archivoActual').style.display = 'none'; // Oculta el enlace si no hay archivo
    }
}
document.querySelectorAll('.eliminarForm').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Muestra el mensaje de éxito o error
            window.location.reload(); // Recarga la página para ver los cambios
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});


</script>

</body>
</html>
