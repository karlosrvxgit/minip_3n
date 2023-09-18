<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
    <link rel="stylesheet" type="text/css" href="stylep.css">
</head>
<body>
    <span class="spanuno">Personal info</span>
    <span class="basicif">Basic info, like your name and photo</span><br><br>
    
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

        echo "<div class='editarn' ><button  ><a href='/edit/edit.php' class='edit1' >Editar</a></button></div>";
        echo "<p class='profile'>Profile<br><span class='span1'>Some info may be visible to other people
        </span></p>";
        echo "<p>PHOTO:</p>";
        echo "<p>NAME:<span class='passwordinf'>$name</span></p>";
        echo "<p>BIO:<span class='passwordinf'> $bio</span></p>";
        echo "<p>PHONE:<span class='passwordinf'> $phone</span></p>";
        echo "<p>EMAIL:<span class='passwordinf'>$user_email</span></p>";
        echo "<p>PASSWORD:<span class='passwordinf'>$password ***********</span></p>";
           
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
    <!-- <a href='/edit/edit.php'>Editar</a> -->
    <!-- <a href='/logout.php'>Cerrar Sesión</a> -->
</body>
</html>
