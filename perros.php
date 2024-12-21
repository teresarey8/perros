<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $peso = $_POST['peso'];
    $color = $_POST['color'];
    $sexo = $_POST['sexo'];

    if (isset($_POST['add'])) {
        $query = "INSERT INTO coches (nombre, peso, color, sexo) VALUES ('$nombre', '$peso', '$color', '$sexo')";
        $conn->query($query);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM coches WHERE id=$id";
        $conn->query($query);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $query = "UPDATE coches SET nombre='$nombre', peso='$peso', color='$color', sexo='$sexo' WHERE id=$id";
        $conn->query($query);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
    <title>Gestión de Coches</title>
</head>
<body>
    <h2>Gestión de Coches</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Matrícula" required>
        <input type="number" step="0.01" name="peso" placeholder="peso" required>
        <input type="text" name="color" placeholder="Color" required>
        <input type="text" name="sexo" placeholder="sexo" required>
        <button type="submit" name="add">Agregar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Matrícula</th>
            <th>peso</th>
            <th>Color</th>
            <th>sexo</th>
            <th>Acciones</th>
        </tr>
        <?php
        $query = "SELECT * FROM coches";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <form method='POST' action=''>
                    <td>{$row['id']}<input type='hidden' name='id' value='{$row['id']}'></td>
                    <td><input type='text' name='nombre' value='{$row['nombre']}'></td>
                    <td><input type='number' step='0.01' name='peso' value='{$row['peso']}'></td>
                    <td><input type='text' name='color' value='{$row['color']}'></td>
                    <td><input type='text' name='sexo' value='{$row['sexo']}'></td>
                    <td>
                        <button type='submit' name='edit'>Editar</button>
                        <button type='submit' name='delete'>Eliminar</button>
                    </td>
                </form>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
