<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información</title>
    <link rel="stylesheet" type="text/css" href="/edit/stylee.css">
</head>

<body>
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
            echo "<span class='changeinfo' >Change Info</span><br>";
            echo "<span class='changeswill'>Changes will be reflected to every services
            </span><br><br>";
            echo "<div><img src='/imagenes/worker.svg' width='50px'</div><span class='photo' >CHANGE PHOTO</span><br>";
            echo "<label for='name'>Name:</label> <br>";
            echo "<input type='text' placeholder='Enter your name...' name='name' value='$name'><br><br>";

            echo "<label for='bio'>Bio:</label><br>";
            echo "<textarea placeholder='Enter your bio...'name='bio' rows='4'>$bio</textarea><br><br>";

            echo "<label for='phone'>Phone:</label><br>";
            echo "<input type='text' placeholder='Enter your phone...' name='phone' value='$phone'><br><br>";

            echo "<label for='email'>Email:</label><br>";
            echo "<input type='email' placeholder='Enter your email...' name='email' value='$email'><br><br>";

            echo "<label for='password'>Password:</label><br>";
            echo "<input type='email' placeholder='Enter your password...' name='email' value='$password'><br><br>";

            echo "<input class='save' type='submit' value='Save'><br>";
            echo "<div class='close'><a href='/logout.php'  >Cerrar Sesión</a></div>";
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

    <!-- <a href="/logout.php">Cerrar Sesión</a> -->

</body>
<div class="footerend">
<footer>created by Carlos RV.</footer>
<footer>devChallenges.io</footer>
</div>

</html>