<div class="container text-center mt-3">
    <div class="row">
        <?php
        // Mostrar los productos en tarjetas con carrusel
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col">';
                echo '<div class="card" style="width: 18rem;">';
                echo '<div id="productCarousel-' . $row['id'] . '" class="carousel slide" data-bs-ride="carousel">';
                echo '<div class="carousel-inner">';

                // Agregar imágenes del carrusel
                $firstItem = true;
                $images = explode(',', $row['imagenes']); // Supongo que las imágenes están almacenadas como un string separado por comas
                foreach ($images as $index => $image) {
                    echo '<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel"'  . $row['id'] . '" class="carousel slide" data-bs-ride="carousel">';
                    echo '<div class="carousel-inner">';

                    $firstItem = true;
                    $images = explode(',', $row['imagen']);
                    foreach ($images as $index => $image) {
                        echo '<div class="carousel-item' . ($firstItem ? ' active' : '') . '">';
                        echo '<img src="' . $image . '" class="d-block w-100" alt="Imagen ' . ($index + 1) . '">';
                        echo '</div>';
                        $firstItem = false;
                    }
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
    </div>
</div>
