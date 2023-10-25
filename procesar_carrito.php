<?php
// ...

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-to-cart'])) {
    // Recoge los datos del 
    $producImagen=$_POST['product-img'];
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $quantity = $_POST['quantity'];
    $productPrice = floatval(str_replace('$', '', $productPrice));
   

    include 'conexion.php';

    $sql = "INSERT INTO pedidos (img_car,product_name, product_price, quantity) VALUES (?,?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verifica si la preparación de la declaración fue exitosa
    if ($stmt) {
        $stmt->bind_param("ssdi",$producImagen, $productName, $productPrice, $quantity );

        if ($stmt->execute()) {
            echo "Pedido agregado con éxito";
            header("Location: mostrar_carrito.php");
            
        } else {
            echo "Error al agregar el pedido: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la declaración SQL: " . $conn->error;
    }

    $conn->close();
}

?>
