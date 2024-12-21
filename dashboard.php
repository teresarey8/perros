<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <a href="perros.php">Gestionar perros</a>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
