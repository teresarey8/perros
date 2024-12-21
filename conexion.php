<?php
$servername = "db";
$username = "gestion_perros";
$password = "1234"; // Cambia esto según tu configuración
$dbname = "gestion_perros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
