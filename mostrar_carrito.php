<!DOCTYPE html>
<html>

<head>
    <title>Detalles del Pedido</title>
</head>
<style>
    .container {
        text-align: center;

    }

    /* Estilos para el contenedor de la tabla */
    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 15px;
    }

    /* Estilos para la tabla */
    table {
        width: 90%;
        border-collapse: collapse;
    }

    /* Estilos para las celdas de la tabla */
    th,
    td {
        padding: 8px;
        text-align: left;
        vertical-align: middle;
        text-align: center;

    }

    td {
        font-family: 'Times New Roman', Times, serif;
        font-size: larger;
    }

    /* Estilos para el encabezado de la tabla */
    th {
        background-color: #E8F6F3;
        font-weight: bold;

    }

    /* Estilos para las filas pares */
    tr:nth-child(even) {
        background-color: #E8F6F3;

        /* Fondo gris claro para filas pares */
    }

    /* Estilos para las líneas divisorias superior e inferior */
    tr {
        border-top: 1px solid #000000;
        /* Línea divisoria superior */
    }

    /* Estilos para la última fila (Total General) */
    tbody tr:last-child {
        font-weight: bold;
        /* Texto en negrita en la última fila */
        border-bottom: 1px solid #000000;
        /* Línea divisoria inferior en la última fila */
    }

    .thumbnail {
        width: 90px;
        height: 90px;
        margin: 5px;
        background-size: cover;
        cursor: pointer;
    }
    input{
        text-align: center;
        width:80px;
   
    } 
</style>
<main>

    <body>
        <?php include 'componentes/nav.php'; ?>
        <br>
        <div class="container">
            <h1>Detalles del Pedido</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Establece la conexión a la base de datos
                        include 'conexion.php';

                        $sql = "SELECT id, img_car,product_name, product_price, quantity FROM pedidos";
                        $result = $conn->query($sql);

                        $totalGeneral = 0; // Inicializa el total general

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $idpedido = ["id"];
                                $produc_img = ["img_car"];
                                $productName = $row["product_name"];
                                $productPrice = $row["product_price"];
                                $quantity = $row["quantity"];
                                $total = $productPrice * $quantity;

                                // Actualiza el total general
                                $totalGeneral += $total;

                                // Muestra los detalles del pedido en la tabla

                                echo "<tr>";
                                echo "<td><img class='thumbnail' src='" . $row["img_car"] . "' alt='Imagen del Producto'></td>";
                                echo "<td>" . $productName . "</td>";
                                echo "<td>$" . number_format($productPrice, 2) . "</td>"; // Formatea el precio como dinero
                                echo "<td><input type='number' name='quantity' id='quantity_" . $row['id'] . "' value='" . $quantity . "' min='1'></td>";
                                echo "<td>$" . number_format($total, 2) . "</td>"; // Formatea el total como dinero
                                echo "<td><a href='eliminar_pedido.php?id=" . $row['id'] . "'><i class='fa fa-trash fa-lg' aria-hidden='true'></i></a></td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "No se encontraron registros de pedidos.";
                        }

                        $conn->close();
                        ?>
                        <!-- Agrega una fila para el total general -->
                        <tr>
                            <td colspan="4"><strong>Total General</strong></td>
                            <td><strong>$<?php echo number_format($totalGeneral, 2); ?></strong></td>
                            <td><a href="">REALIZAR PAGO</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var quantityInputs = document.querySelectorAll("input[name='quantity']");

                // Agrega un evento de cambio a cada campo de entrada de cantidad
                quantityInputs.forEach(function(input) {
                    input.addEventListener("change", function() {
                        var id = this.id.split("_")[1]; // Obtiene el ID del pedido
                        var newQuantity = this.value; // Obtiene la nueva cantidad

                        console.log("ID del pedido: " + id);
                        console.log("Nueva cantidad: " + newQuantity);
                        $.ajax({
                            url: "actualizar_cantidad.php",
                            method: "POST",
                            data: {
                                id: id,
                                quantity: newQuantity
                            },
                            success: function(response) {
                                // Maneja la respuesta del servidor si es necesario
                                // Por ejemplo, puedes mostrar un mensaje de éxito
                                console.log("Cantidad actualizada exitosamente");
                                location.reload();
                            },
                            error: function() {
                                // Maneja errores si es necesario
                                console.log("Error al actualizar la cantidad");
                            }
                        });
                    });
                });
            });
        </script>

    </body>
</main>



</html>