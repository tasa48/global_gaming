
<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = [];

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio (index.php) con un parámetro GET para mostrar el mensaje
header("Location: ../index.php?logout=1");
exit();
?>