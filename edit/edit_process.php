<?php
session_start();

// Verifica si el usuario está autenticado (es decir, si hay una sesión activa)
if (isset($_SESSION['user_id'])) {
    // El usuario está autenticado, puedes continuar con la edición de información

    // Recupera los datos de la sesión
    $user_id = $_SESSION['user_id'];

    // Verifica si se enviaron datos de edición
    if (isset($_POST['name']) && isset($_POST['bio']) && isset($_POST['phone'])) {
        // Recupera los datos del formulario
        $name = $_POST['name'];
        $bio = $_POST['bio'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        try {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "login_db";
        
            $mysqli = new mysqli($hostname, $username, $password, $dbname);
        
        } catch (\mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Consulta SQL para actualizar la información del usuario
        $query = "UPDATE users SET name = ?, bio = ?, phone = ? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        // $stmt = $db->prepare($query);
        $stmt->bind_param('sssi', $name, $bio, $phone, $user_id);

        if ($stmt->execute()) {
            // Edición exitosa, redirige al usuario a la página de información personal
            header('Location:/edit/edit.php');
            exit();
        } else {
            // Error al editar la información, muestra un mensaje de error
            echo "Error al editar la información. <a href='/edit/edit.php'>Volver a intentar</a>";
        }

        // Cierra la conexión a la base de datos
        $stmt->close();
        $mysqli->close();
        // $db->close();
    } else {
        // Si no se enviaron datos de edición, muestra la página de edición
        include('/edit/edit.php');
    }
} else {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión
    header('Location: /login/login.php');
    exit();
}
?>

