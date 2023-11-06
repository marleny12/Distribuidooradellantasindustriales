<?php

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

// Proporciona un enlace para descargar el PDF generado
echo '<a href="' . $pdfFileName . '" target="_blank">Descargar PDF</a>';
?>