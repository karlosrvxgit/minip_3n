<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <!-- Formulario de inicio de sesión -->
    <form action="/login/login_process.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <a href="/register/register.php">Registrarse</a>
</body>
</html>

