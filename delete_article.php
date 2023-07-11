<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articleId = $_POST['id'];

    $sql = "DELETE FROM articles WHERE id = $articleId";

    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'Artículo eliminado exitosamente.', 'class' => 'success');
    } else {
        $response = array('message' => 'Error al eliminar el artículo: ' . $conn->error, 'class' => 'danger');
    }

    echo json_encode($response);
}

$conn->close();
?>
