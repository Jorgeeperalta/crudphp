<?php
// Verificar si se ha enviado un archivo
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Obtener detalles del archivo
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Verificar si no hay errores en la carga del archivo
    if ($fileError === UPLOAD_ERR_OK) {
        // Mover el archivo a una ubicación deseada
        $destination = 'uploads/' . $fileName;
        move_uploaded_file($fileTmpName, $destination);

        // Obtener otros datos del formulario
        $title = $_POST['title'];
        $content = $_POST['content'];

        // Incluir el archivo db.php para obtener la conexión a la base de datos
        include 'db.php';

        // Realizar la inserción en la base de datos
        $sql = "INSERT INTO articles (title, content, file) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $title, $content, $destination);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si la inserción fue exitosa, devolver un mensaje de éxito
            $response = [
                'message' => 'Artículo agregado correctamente',
                'class' => 'success'
            ];
            echo json_encode($response);
        } else {
            // Si hubo un error en la inserción, devolver un mensaje de error
            $response = [
                'message' => 'Error al agregar el artículo',
                'class' => 'error'
            ];
            echo json_encode($response);
        }

        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conn->close();
    } else {
        // Si hay un error en la carga del archivo, devolver un mensaje de error
        $response = [
            'message' => 'Error al cargar el archivo',
            'class' => 'error'
        ];
        echo json_encode($response);
    }
} else {
    // Si no se envió un archivo, devolver un mensaje de error
    $response = [
        'message' => 'No se seleccionó ningún archivo',
        'class' => 'error'
    ];
    echo json_encode($response);
}
