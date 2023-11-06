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
                            <td><strong>$<?php echo number_format($totalGeneral, 2); ?></strong></td><?php

require('fpdf.php');
include 'conexion.php';


$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 11);

$x = $pdf->GetX(); // Obtén la posición actual X
$y = $pdf->GetY(); // Obtén la posición actual Y

// Ancho y alto de la imagen
$anchoImagen = 30; // Ancho en puntos
$altoImagen = 30; // Alto en puntos
// Ruta de la imagen
$rutaImagen = 'imagenes/1.png';

// Agrega la imagen en la celda
$pdf->Image($rutaImagen, $x, $y, $anchoImagen, $altoImagen);

// Desplaza la posición Y a la altura de la celda de imagen
$pdf->SetY($y + $altoImagen);

// Ancho de la celda
$anchoCelda = 100; // Ancho en puntos

// Contenido de varias líneas
$contenido = "LLANTAS INDUSTRIALES AJALPAN S.A DE C.V   
CuauhtEmoc 759-631, Jacarandas, Gonzalisco, 75910 Ajalpan, Pue.";

$nuevaPosicionX = 50; // Cambia el valor según tu necesidad

$pdf->SetX($nuevaPosicionX);

// Agrega el contenido en una celda con múltiples líneas
$pdf->MultiCell($anchoCelda, 10, $contenido, 0, 'C');

$pdf->Ln(); // Salto de línea

$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(127, 179, 213); // R, G, B (valores del color gris)
$nuevaPosicionX = 50; // Cambia el valor según tu necesidad
$pdf->SetX($nuevaPosicionX);
$pdf->Cell(110, 10, 'COTIZACION', 1,0,'C',true);

$pdf->Ln(); // Salto de línea
$pdf->Ln(); // Salto de línea

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(127, 179, 213); // R, G, B (valores del color gris)
$pdf->Cell(110, 10, 'PRODUCTO', 1,0,'C',true);
$pdf->Cell(20, 10, 'PRECIO', 1,0,'C',true);
$pdf->Cell(20, 10, 'CANT', 1,0,'C',true);
$pdf->Cell(30, 10, 'TOTAL ', 1,0,'C' ,true);
$pdf->Ln(); // Salto de línea

// Inicializa la variable $totalGeneral
$totalGeneral = 0;

$sql = "SELECT product_name, product_price, quantity FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
     $productName = $row["product_name"];
     $productPrice = $row["product_price"];
     $quantity = $row["quantity"];
     $total = $productPrice * $quantity;

     // Agregar una fila a la tabla en el PDF
     $pdf->Cell(110, 10, $productName, 1);
     $totalf2=number_format($productPrice,2);
     $pdf->Cell (20, 10, $totalf2, 1,0,'C');
     $pdf->Cell(20, 10, $quantity, 1,0,'C');
     $totalf=number_format($total,2);
     $pdf->Cell(30, 10, $totalf, 1 ,0,'C');
     $pdf->Ln(); // Salto de línea

     // Actualiza el total general
     $totalGeneral += $total;
 }

 // Agrega una fila al final de la tabla para el total general
 $pdf->SetFont('Arial', 'B', 11);
 $pdf->SetFillColor(163, 228, 215); // R, G, B (valores del color gris)
 $pdf->Cell(110, 10, );
 $pdf->Cell(40, 10, 'TOTAL GENERAL ', 1,0,'C',true);
 $totalGeneralFormatted = number_format($totalGeneral, 2); 
 $pdf->Cell(30, 10, '$' . $totalGeneralFormatted, 1,'C',true);
}
$pdf->SetY($pdf->GetY() + 10); 
 
// Agregar texto al pie de la columna
$pdf->SetFont('Arial', 'I', 10); // Fuente y tamaño diferente para el pie
$pdf->Cell(110, 10, 'NOTA: Los precios esta sujetos a cambios sin previo aviso, esta cotizacion solo es valida durante 7 dias habiles ', 0,0, 'L');


// Guardar el PDF en el servidor
$pdfFileName = 'cotizacion.pdf';
$pdf->Output('F', $pdfFileName);



echo '<td><a href="' . $pdfFileName . '" target="_blank">GENERAR COTIZACION</a></td>';

                           ?>
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