<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Registrarse</h1>
   
    <div class="form-container">
        <form action="/register/register_process.php" method="post">
            <div class="form-group">
                <label for="form2Example1">Email:</label>
                <input type="email" name="email" id="form2Example1" required><br>
            </div>

            <div class="form-group">
                <label for="form2Example2">Contraseña:</label>
                <input type="password" name="password" id="form2Example2" required><br>
                <input type="submit" class="btn-primary" value="Registrarse">
            </div>
           




        </form>
    </div>
    <a href="/login/login.php">Iniciar Sesión</a>
</body>

</html>