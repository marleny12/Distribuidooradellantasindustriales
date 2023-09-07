<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $rin = $_POST['rin'];
    $marca = $_POST['marca'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Procesar y validar las imágenes
    $imagenes = $_FILES['imagen']['name'];
    $imagenesTmp = $_FILES['imagen']['tmp_name'];

    $carpetaDestino = 'img/';
    $rutaCompletas = array();

    foreach ($imagenes as $key => $imagenNombre) {
        $imagenTmp = $imagenesTmp[$key];
        $rutaCompleta = $carpetaDestino . $imagenNombre;

        if (move_uploaded_file($imagenTmp, $rutaCompleta)) {
            $rutaCompletas[] = $rutaCompleta;
        }
    }

    // Subida exitosa, ahora puedes guardar los datos en la base de datos

    // Preparar y ejecutar la consulta SQL
    $rutaCompletasString = implode(",", $rutaCompletas);
    $sql = "INSERT INTO productos (nombre,rin,marca, descripcion, precio, stock, imagen) VALUES ('$nombre', '$rin','$marca','$descripcion', $precio, $stock, '$rutaCompletasString')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto registrado exitosamente.";
    } else {
        echo "Error al registrar el producto: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>REGISTRO</title>
</head>

<body>
    <div>
        <?php include 'cfrontendusuario/nav.php' ?>
    </div>

    <div class="container">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h1>Registrar Producto</h1>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto:</label>
                        <input type="text" name="nombre" required><br><br>
                    </div>

                    <div class="form-group">
                        <label for="rin">Rin</label>
                        <select name="rin" class="form-select" aria-label="Default select example" required>
                            <option value="R13">R13</option>
                            <option value="R14">R14</option>
                            <option value="R15">R15</option>
                        </select><br><br>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <select name="marca" class="form-select" aria-label="Default select example" required>
                            <option value="TORQUE">TORQUE</option>
                            <option value="GOODYEAR">GOODYEAR</option>
                            <option value="TORNEL">TORNEL</option>
                        </select><br><br>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" rows="4" cols="50"></textarea><br><br>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" step="0.01" required><br><br>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" required><br><br>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen del Producto:</label>
                        <input type="file" name="imagen[]" id="imagenInput" accept="image/*" multiple required><br><br>
                        <br>


                        <img id="imagenPreview" src="#" alt="Vista Previa de la Imagen" style="max-width: 200px; display: none;">

                    </div>


                    <input type="submit" value="registrar">
                </form>

                <script>
                        const imagenInput = document.getElementById('imagenInput');
                        const imagenPreview = document.getElementById('imagenPreview');

                        imagenInput.addEventListener('change', function () {
                            const file = imagenInput.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function (e) {
                                    imagenPreview.src = e.target.result;
                                    imagenPreview.style.display = 'block';
                                };
                                reader.readAsDataURL(file);
                            } else {
                                imagenPreview.style.display = 'none';
                            }
                        });
                    </script>
            </div>
        </div>
    </div>

</body>

</html>


<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        margin-top: 250px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 5px;
    }

    .form-group textarea {
        resize: vertical;
    }
</style>
