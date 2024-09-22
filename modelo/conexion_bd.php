<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "global_gaming";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


mysqli_set_charset($conn, "utf8");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
