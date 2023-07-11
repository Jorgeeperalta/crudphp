<?php
include 'db.php';

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td >' . $row['title'] . '</td>';
        echo '<td >' . $row['content'] . '</td>';
        echo '<td class="w-75"><a href="https://crudphpjorge.000webhostapp.com/uploads/' . $row['file'] . '"> <button class="btn btn-success ">' . $row['file'] . '</button> </a> </td>';
        echo '<td class="w-75">';
        echo '<button class="btn btn-primary editBtn" data-id="' . $row['id'] . '">Editar</button> ';
        echo '<button class="btn btn-danger deleteBtn" data-id="' . $row['id'] . '">Eliminar</button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="3">No se encontraron artículos.</td></tr>';
}

$conn->close();
?>
//https://crudphpjorge.000webhostapp.com/uploads/