<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

// Consulta SQL para obtener todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include 'componentes/nav.php' ?>
    <!-- Formulario para filtrar por rin y marca -->
    <br>
    <form action="llantas.php" method="GET" class="mb-3">
        <div class="container text-center mt-3">
            <div class="row">
                <div class="col">
                    <label for="rin"></label>
                    <select name="rin" required>
                        <option value="R13">R13</option>
                        <option value="R14">R14</option>
                        <option value="R15">R15</option>
                        <!-- Agrega más opciones según tus necesidades -->
                    </select>
                </div>
                <div class="col">
                    <label for="marca"></label>
                    <select name="marca" required>
                        <option value="TORQUE">TORQUE</option>
                        <option value="GOODYEAR">GOODYEAR</option>
                        <option value="TORNEL">TORNEL</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                </div>
            </div>

        </div>
    </form>
    <?php
    include 'conexion.php';
    // Verificar si se envió el formulario de filtrado
    if (isset($_GET['rin']) && isset($_GET['marca'])) {
        // Obtener los valores de filtro de la URL
        $rinFiltro = $_GET['rin'];
        $marcaFiltro = $_GET['marca'];

        // Consulta SQL para obtener productos filtrados
        $sql = "SELECT * FROM productos WHERE rin = '$rinFiltro' AND marca = '$marcaFiltro'";
        $result = $conn->query($sql);
    } else {
        // Consulta SQL para obtener todos los productos
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>

    <div class="container text-center mt-3">
        <div class="row">
            <?php
            // Mostrar los productos en tarjetas
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col">';
                    echo '<div class="card" style="width: 18rem;">';
                    // Agregar el carrusel de imágenes aquí
                    echo '<div id="productCarousel-' . $row['id'] . '" class="carousel slide" data-bs-ride="carousel">';
                    echo '<div class="carousel-inner">';

                    $firstItem = true;
                    $images = explode(',', $row['imagen']);

                    foreach ($images as $index => $imagePath) {
                        echo '<div class="carousel-item' . ($firstItem ? ' active' : '') . '">';
                        echo '<img src="' . $imagePath . '" class="d-block w-100" alt="Imagen ' . ($index + 1) . '">';
                        echo '</div>';
                        $firstItem = false;

                    }
                    echo '</div>';
                    echo '<button class="carousel-control-prev" type="button" data-bs-target="#productCarousel-' . $row['id'] . '" data-bs-slide="prev">';
                    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                    echo '<span class="visually-hidden">Previous</span>';
                    echo '</button>';
                    echo '<button class="carousel-control-next" type="button" data-bs-target="#productCarousel-' . $row['id'] . '" data-bs-slide="next">';
                    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                    echo '<span class="visually-hidden">Next</span>';
                    echo '</button>';
                    echo '</div>';

                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $row['descripcion'] . '</p>';
                    echo '<p class="card-text">Rin: ' . $row['rin'] . '</p>';
                    echo '<p class="card-text">Marca: ' . $row['marca'] . '</p>';
                    echo '<p class="card-text">Precio: ' . $row['precio'] . '</p>';
                    echo '<p class="card-text">Stock: ' . $row['stock'] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Detalles</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col">';
                echo '<p>No se encontraron productos con los filtros seleccionados.</p>';
                echo '</div>';
            }
            ?>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
                crossorigin="anonymous"></script>

            <?php
            include 'componentes/footer.php';
            ?>
            

</body>

</html>
