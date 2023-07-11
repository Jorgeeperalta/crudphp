<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_articles";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>