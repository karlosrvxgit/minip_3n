<?php
session_start();

// Destruye la sesión existente, eliminando todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de inicio (index.php en este caso)
header('Location: /index.php');
exit();
?>