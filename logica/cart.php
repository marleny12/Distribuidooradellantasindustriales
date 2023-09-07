<?php
session_start();
require 'conexion.php';

if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['product_id'])) {
    $productID = $_GET['product_id'];
    if (!in_array($productID, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $productID;
    }
}
?>
