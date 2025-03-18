<?php
include 'db.php';
include 'header.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<h2>Lista de Productos</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['descripcion'] ?></td>
        <td><?= $row['precio'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Editar</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include 'footer.php'; ?>