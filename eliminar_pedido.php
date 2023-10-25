<?php
if (isset($_GET['id'])) {
    // Establece la conexión a la base de datos
    include 'conexion.php';

    $pedido_id = $_GET['id'];

    // Consulta SQL para eliminar el pedido
    $sql = "DELETE FROM pedidos WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $pedido_id);

        if ($stmt->execute()) {
            // Redirige de nuevo a la página de detalles del pedido o a donde desees
            header("Location: mostrar_carrito.php");
            exit;
        } else {
            echo "Error al eliminar el pedido: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la declaración SQL: " . $conn->error;
    }

    $conn->close();
} else {
    // Redirige de vuelta a la página de detalles del pedido si no se proporciona un ID válido
    header("Location: mostrar_carrito.php");
    exit;
}
?>
