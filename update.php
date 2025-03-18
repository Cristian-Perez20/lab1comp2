<?php
include 'db.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio, stock=$stock WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Editar Producto</h2>
<form method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required><br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required><?= $row['descripcion'] ?></textarea><br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?= $row['precio'] ?>" required><br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="<?= $row['stock'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>

<?php include 'footer.php'; ?>