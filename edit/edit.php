<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Editar Información</h1>


    <?php
    session_start();

    // Verificar si el usuario está autenticado (es decir, si hay una sesión activa)
    if (isset($_SESSION['user_id'])) {
        // El usuario está autenticado, puedes continuar con la edición de información

        // Recupera los datos de la sesión
        $user_id = $_SESSION['user_id'];


        try {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "login_db";
        
            $mysqli = new mysqli($hostname, $username, $password, $dbname);
        
        } catch (\mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Consulta SQL para obtener la información actual del usuario
        $query = "SELECT name, bio, phone, email FROM users WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        // $stmt = $db->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Mostrar la información actual del usuario en el formulario de edición
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $bio = $row['bio'];
            $phone = $row['phone'];

            echo "<form action='edit_process.php' method='post'>";
            echo "<label for='name'>Nombre:</label>";
            echo "<input type='text' name='name' value='$name'><br>";

            echo "<label for='email'>Email:</label>";
            echo "<input type='email' name='email' value='$email'><br>";

            echo "<label for='bio'>Bio:</label>";
            echo "<textarea name='bio' rows='4'>$bio</textarea><br>";

            echo "<label for='phone'>Teléfono:</label>";
            echo "<input type='text' name='phone' value='$phone'><br>";

            echo "<input type='submit' value='Guardar Cambios'>";
            echo "</form>";
        } else {
            echo "No se encontró información del usuario.";
        }

        // Cierra la conexión a la base de datos
        $stmt->close();
        $mysqli->close();
       
    } else {
        // Si el usuario no está autenticado, muestra un mensaje de error y un enlace para iniciar sesión
        echo "Debes iniciar sesión para editar tu información. <a href='/login/login.php'>Iniciar Sesión</a>";
    }
    ?>
    
    <a href="/logout.php">Cerrar Sesión</a>
</body>
</html>