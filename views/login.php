<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body, html {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            width: 100%;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
        .column1, .column2 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .column1 {
            padding: 0;
            overflow: hidden;
        }
        .column1 img {
            width: 100%;
            height: auto;
            border-radius: 8px 0 0 8px;
        }
        .login-container {
            padding: 20px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        input[type="text"],
        input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        img{
            min-height: 250px; 
            max-width: 300px;
            
        }
        /* Estilos para vista en dispositivos móviles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .column1, .column2 {
                border-radius: 8px;
                width: 90%;
            }
            .column1 img {
                border-radius: 8px 8px 0 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="column1">
            <img src="../images/est.jpg" alt="Imagen de ejemplo">
        </div>
        <div class="column2">
            <h1>Iniciar Sesión</h1>
            <form action="">
                <input type="text" name="username" id="username" placeholder="Usuario">
                <input type="password" name="password" id="password" placeholder="Contraseña">
                <input type="submit" value="Ingresar">
            </form>
        </div>
    </div>
</body>
</html>
