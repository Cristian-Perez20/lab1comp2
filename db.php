<?php
// Archivo: includes/db.php
$host = 'localhost';
$user = 'root';
$password = ''; // Si no tienes contraseña, déjalo vacío
$dbname = 'crud_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
