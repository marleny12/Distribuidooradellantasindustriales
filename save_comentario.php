<?php
// Conecta a la base de datos (debes reemplazar estas variables con las tuyas)
include 'conexion.php';

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recibe los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];

    // Prepara la consulta SQL
    $sql = "INSERT INTO comentarios (nombre, comentario) VALUES (?, ?)";

    // Utiliza sentencias preparadas para evitar ataques de SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $comentario);

    if ($stmt->execute()) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    // Cierra la conexión y devuelve una respuesta JSON
    $stmt->close();
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
