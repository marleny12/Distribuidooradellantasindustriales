<?php
// Conecta a la base de datos (debes reemplazar estas variables con las tuyas)
include 'conexion.php';

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener los comentarios
$sql = "SELECT nombre, comentario, fecha FROM comentarios ORDER BY fecha DESC";
$result = $conn->query($sql);

$comentarios = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comentarios[] = array(
            'nombre' => $row["nombre"],
            'comentario' => $row["comentario"],
            'fecha' => $row["fecha"]
        );
    }
}


$conn->close();
header('Content-Type: application/json');
echo json_encode($comentarios);
?>
