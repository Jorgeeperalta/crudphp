<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $articleId = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Sentencia preparada
    $stmt = $conn->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $articleId);

    if ($stmt->execute()) {
        $response =$content;
    } else {
        $response = array('message' => 'Error al actualizar el artículo: ' . $stmt->error, 'class' => 'danger');
    }

    echo json_encode($response);
}

$conn->close();
?>
