<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articleId = $_POST['id'];

    $sql = "SELECT * FROM articles WHERE id = $articleId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row); // Enviar los datos del artículo en formato JSON
    } else {
        echo json_encode(null); // Si no se encuentra el artículo, enviar null
    }
}

$conn->close();
?>
