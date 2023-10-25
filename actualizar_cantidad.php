<?php
// Establece la conexión a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $newQuantity = $_POST['quantity'];

    // Realiza la actualización en la base de datos
    $sql = "UPDATE pedidos SET quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $newQuantity, $id);

        if ($stmt->execute()) {
            echo "Cantidad actualizada con éxito";
        } else {
            echo "Error al actualizar la cantidad: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la declaración SQL: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Solicitud no válida";
}
?>
