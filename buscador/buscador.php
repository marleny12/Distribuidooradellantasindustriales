<?php

// Consulta para obtener una lista de productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Crear un array para almacenar los resultados
$productos = array();

// Obtener los resultados de la consulta
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($productos);
?>
