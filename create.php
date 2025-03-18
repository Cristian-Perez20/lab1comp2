<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES ('$nombre', '$descripcion', $precio, $stock)";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Agregar Producto</h2>
<form method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea><br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required><br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" required><br>
    <button type="submit">Guardar</button>
</form>

<?php include 'footer.php'; ?>