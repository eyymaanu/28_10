<?php
session_start();
include_once '../config/database.php';

// Función para iniciar sesión
function login($email, $password) {
    $conn = conectar();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        header("Location: ../views/vistaAdmin.php");
        exit;
    } else {
        echo "<script>alert('Correo o contraseña incorrectos');</script>";
    }

    $stmt->close();
    $conn->close(); 
}

// Manejo de la solicitud de inicio de sesión
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    login($email, $password);
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="heading">Iniciar Sesión</div>
        <form class="form" action="login.php" method="POST">
            <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
            <input required class="input" type="password" name="password" id="password" placeholder="Contraseña">
            <input class="login-button" type="submit" value="Iniciar Sesión" name="login">
        </form>
    </div>
</body>
</html>
