<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a mi Aplicación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container label {
            display: block;
            margin-bottom: 8px;
        }
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px; /* Espacio adicional entre botones */
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .login-container .options {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .login-container .options a {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>TaskList login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>

        <div class="options">
            <a href="{{ route('register') }}">Registrarse</a>
            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</body>
</html>
