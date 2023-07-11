<?php

// Configuración de la base de datos
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "crud_articles";
$host = 'db4free.net:3306'; 
$username = "crudphpjorge";
$password = "Abc.123**";
$dbname = "crudphpjorge";
// Crear conexión
//$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn =new mysqli($host, $username, $password, $dbname);
// Verificar la conexión
// if (!$conn) {
//     die("Error en la conexión: " . mysqli_connect_error());
// }
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  ?>
/////https://crudphpjorge.000webhostapp.com/