
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>

    <style>
        /* styles.css */

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: space-between;
            /* Espacio entre las columnas */
            max-width: 1000px;
            /* Ajusta el ancho máximo según tus necesidades */
            margin: 0 auto;
        }

        .info {

            text-align: center;
        }

        h1 {
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input,
        select {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #005886;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .container {
            display: flex;
            justify-content: space-between;
            /* Espacio entre las columnas */
        }

        .column {
            flex-basis: 50%;
            /* Aumenta el valor para hacer las columnas más grandes */
            padding: 20px;
            /* Espacio interior para separación */
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .column-r {
            flex-basis: 50%;
            /* Aumenta el valor para hacer las columnas más grandes */
            padding: 20px;
            /* Espacio interior para separación */
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #F5B7B1;

        }

        .column:first-child {
            margin-right: 20px;
            /* Puedes ajustar el valor según el espacio que desees */
        }

        /* Agrega margen izquierdo a la segunda columna */
        .column:last-child {
            margin-left: 20px;
            /* Puedes ajustar el valor según el espacio que desees */
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                /* Cambia la dirección de flex a columna */
            }

            .column,
            .column-r {
                flex-basis: 100%;
                /* Las columnas ocupan todo el ancho */
                margin: 0;
                /* Elimina los márgenes laterales */
            }

            img {
                max-width: 100%;
                height: auto;
            }

            body {
                font-size: 16px;
                /* Tamaño base del texto */
            }

            h1 {
                font-size: 2em;
                /* 32px en relación con el tamaño base */
            }

            h2 {
                font-size: 1.5em;
                /* 24px en relación con el tamaño base */
            }

        }
    </style>
</head>

<body>
    <?php include './componentes/nav.php'; ?>
    <br>
    <br>

    <h1>No te quedes sin tu servicio Agenda tu cita y no hagas filas </h1>
    <br>
    <?php  ?>
    <div class="container mt-5">
        <div class="column">
            <h1>Agendar Cita</h1>
            <form id="cita-form" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <fieldset>
                    <legend>Servicios:</legend>
                    <label for="servicio1"><input type="checkbox" id="servicio1" name="servicio[]" value="Servicio 1"> Servicio 1</label>
                    <label for="servicio2"><input type="checkbox" id="servicio2" name="servicio[]" value="Servicio 2"> Servicio 2</label>
                    <label for="servicio3"><input type="checkbox" id="servicio3" name="servicio[]" value="Servicio 3"> Servicio 3</label>
                </fieldset>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="hora">Hora:</label>
                <select id="hora" name="hora" type="time" required>
                    <option>SELECIONA LA HORA DE TU CITA</option>
                    <option>09:00 AM</option>
                    <option>09:30 AM</option>
                    <option>10:00 AM</option>
                    <option>10:30 AM</option>
                    <option>11:00 AM</option>
                    <option>11:30 AM</option>
                    <option>12:00 PM</option>
                    <option>12:30 PM</option>
                    <option>01:00 PM</option>
                    <option>01:30 PM</option>
                    <option>02:00 PM</option>
                    <option>02:30 PM</option>
                    <option>03:00 PM</option>
                    <option>03:30 PM</option>
                    <option>04:00 PM</option>
                    <option>04:30 PM</option>
                    <option>05:00 PM</option>
                    <option>05:30 PM</option>
                    <option>06:00 PM</option>
             </select>
                <button type="submit">Agendar Cita</button>
            </form>
        </div>
        <div class="column-r">
            <div class="resumen mt-3">
                <h2>Resumen de la Cita</h2>
                <br>
                <div class="info">
                    <p><strong>El lugar del servicio:</strong><span>Dirección: Cuauhtémoc 759-631, Jacarandas, Gonzalisco, 75910 Ajalpan, Pue.</span></p>
                    <P><strong><i class="fa fa-whatsapp" aria-hidden="true"></i></strong><span> 238-149-65-88</span></p>
                </div>
                <br>
                <p><strong>Nombre:</strong> <span id="resumen-nombre">N/A</span></p>
                <p><strong>Teléfono:</strong> <span id="resumen-telefono">N/A</span></p>
                <p><strong>Servicio:</strong> <span id="resumen-servicio">Ninguno seleccionado</span></p>
                <p><strong>Fecha:</strong> <span id="resumen-fecha">N/A</span></p>
                <p><strong>Hora:</strong> <span id="resumen-hora">N/A</span></p>
            </div>
        </div>
    </div>

    <?php
   
    require('fpdf.php');
    include 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $servicios = implode(", ", $_POST["servicio"]);
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $direccion = "Cuauhtémoc 759-631, Jacarandas, Gonzalisco, 75910 Ajalpan, Pue."; 
    
            $sqlInsertCita = "INSERT INTO citas (nombre, telefono, direccion, servicios, fecha_cita, hora_cita)
                VALUES ('$nombre', '$telefono', '$direccion', '$servicios', '$fecha', '$hora')";
    
            if (mysqli_query($conn, $sqlInsertCita)) {
                echo "La cita se ha registrado con éxito.";
    
            }else {
                    echo "Error al registrar la hora ocupada: ";
                }
            
            $pdf = new FPDF();
            $pdf->AddPage();
    
            // Configurar la fuente y tamaño del texto para el encabezado
            $pdf->SetFont('Arial', 'B', 16);
    
            // Agregar un encabezado centrado
            $pdf->Cell(0, 10, 'Resumen de la Cita', 0, 1, 'C'); // El último parámetro 'C' centra el texto
            $logoPath = 'imagenes/1.png'; 
            $pdf->Image($logoPath, 10, 5, 30);
    
            // Configurar la fuente y tamaño del texto para el contenido
            $pdf->SetFont('Arial', '', 12);
            $columnWidth = $pdf->GetPageWidth() - 20; // Ancho de página menos los márgenes
    
            // Agregar contenido en una columna centrada
            $pdf->SetX(10); // Establecer la posición X
            $pdf->MultiCell($columnWidth, 10, 'Nombre: ' . $nombre, 0, 'C'); 
            $pdf->MultiCell($columnWidth, 10, 'Teléfono: ' . $telefono, 0, 'C'); 
            $pdf->MultiCell($columnWidth, 10, 'Servicio(s): ' . $servicios, 0, 'C'); 
            $pdf->MultiCell($columnWidth, 10, 'Fecha: ' . $fecha, 0, 'C'); 
            $pdf->MultiCell($columnWidth, 10, 'Hora: ' . $hora, 0, 'C');
    
            $pdf->SetY($pdf->GetY() + 10); 
    
            // Agregar texto al pie de la columna
            $pdf->SetFont('Arial', 'I', 10); // Fuente y tamaño diferente para el pie
            $pdf->Cell($columnWidth, 10, 'Agradecemos tu preferencia,No faltes a tu cita ', 0, 1, 'C');
    
            // Guardar el PDF en el servidor
            $pdfFileName = 'cita_' . time() . '.pdf'; // Nombre del archivo PDF
            $pdf->Output('F', $pdfFileName); // Guardar el PDF en el servidor
    
            // Proporciona un enlace para descargar el PDF generado
            echo '<br><br><a href="' . $pdfFileName . '" target="_blank">Descargar PDF</a>';
            }

   
    ?>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            const citaForm = document.getElementById('cita-form');
            const nombreInput = document.getElementById('nombre');
            const telefonoInput = document.getElementById('telefono');
            const resumenNombre = document.getElementById('resumen-nombre');
            const resumenTelefono = document.getElementById('resumen-telefono');
            const resumenServicio = document.getElementById('resumen-servicio');
            const resumenFecha = document.getElementById('resumen-fecha');
            const resumenHora = document.getElementById('resumen-hora');

  

            citaForm.addEventListener('input', function(event) {
                const serviciosSeleccionados = Array.from(document.querySelectorAll('input[name="servicio[]"]:checked'))
                    .map(checkbox => checkbox.value);

                if (serviciosSeleccionados.length > 0) {
                    resumenServicio.textContent = serviciosSeleccionados.join(', ');
                } else {
                    resumenServicio.textContent = 'Ninguno seleccionado';
                }

                resumenFecha.textContent = document.getElementById('fecha').value;
                resumenHora.textContent = document.getElementById('hora').value;
                resumenNombre.textContent = document.getElementById('nombre').value;
                resumenTelefono.textContent = document.getElementById('telefono').value;

            });

            citaForm.addEventListener('submit', function(event) {
                resumenNombre.textContent = nombreInput.value;
                resumenTelefono.textContent = telefonoInput.value;
            });
        });

    </script>

    <br>
    <br>
    <?php include './componentes/footer.php' ?>
</body>

</html>