<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Perfil de Usuario</h1>
    <?php
    session_start();

    // Verificar si el usuario está autenticado (es decir, si hay una sesión activa)
    if (isset($_SESSION['user_id'])) {
        // El usuario está autenticado, puedes continuar mostrando los datos del perfil

        // Recupera los datos de la sesión
        $user_id = $_SESSION['user_id'];
        // $user_name = $_SESSION['user_name'];
        $user_email = $_SESSION['user_email'];

        // se obtiene los datos adicionales del usuario desde la base de datos (excepto la contraseña)
        try {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "login_db";

            $mysqli = new mysqli($hostname, $username, $password, $dbname);
        } catch (\mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }

        $query = "SELECT name, bio, phone FROM users WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Mostrar la información del usuario (excepto la contraseña)
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $bio = $row['bio'];
            $phone = $row['phone'];

        echo "<p><strong>Nombre:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $user_email</p>";
        echo "<p><strong>Biografia:</strong> $bio</p>";
        echo "<p><strong>Teléfono:</strong> $phone</p>";
    } else {
        echo "No se encontró información del usuario.";
    }

    // Cierra la conexión a la base de datos
    $stmt->close();
    $mysqli->close();
} else {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión
    header('Location: /login/login.php');
    exit();
}
    ?>
    <a href='/edit/edit.php'>Editar Información</a>
    <a href='/logout.php'>Cerrar Sesión</a>
</body>
</html>
