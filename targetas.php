<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- En el encabezado de tu HTML -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>


        <title>Document</title>

        <style>
            .img-thumbnail {
                width: 100%;
                height: 200px;
                /* Cambiar a la altura deseada */
            }

            .modal-dialog {
                max-width: 35%;
                /* Ajusta el ancho del modal según tus necesidades */
                max-height: 35vh;
                /* Ajusta la altura máxima del modal según tus necesidades */
            }

            @media (max-width: 768px) {
                .modal-dialog {
                    max-width: 80%;
                    /* Ajusta el ancho según tus necesidades */
                    max-height: 80vh;
                    /* Ajusta la altura según tus necesidades */
                }
            }



            .tendencia {
                margin-right: 20px;
                /* Margen derecho por defecto */
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
            }

            @media (max-width: 768px) {

                /* Estilos para pantallas más pequeñas */
                .tendencia {
                    margin-right: 0;
                    /* Elimina el margen derecho */
                    margin-bottom: 10px;
                    /* Agrega margen inferior para separar elementos */
                }
            }

            @media (max-width: 768px) {
                .custom-modal-body {
                    max-height: 1vh;
                    /* Ajusta la altura máxima según tus necesidades */
                    overflow-y: auto;
                    /* Agrega una barra de desplazamiento vertical si el contenido es largo */
                    padding: 15px;
                    /* Ajusta el espaciado interior del cuerpo del modal */
                }
            }

            @media (max-width: 768px) {
                .carousel-inner {
                    max-height: 1vh;
                    /* Ajusta la altura máxima según tus necesidades */
                    overflow: hidden;
                    /* Oculta el desbordamiento para evitar márgenes innecesarios */
                }
            }
        </style>
    </head>

    <body>
        <div class="tendencia">
            <h3>
                Lo Último en Tendencia
            </h3>
        </div>
        <br>
        <!-- Targetas-->
        <div class="container">
            <div class="row justify-content-center">
                <?php
                include 'conexion.php';
                $consulta = "SELECT * FROM tendency";
                $resultado = $conn->query($consulta);

                if ($resultado->num_rows > 0) {
                    $counter = 0;
                    while ($fila = $resultado->fetch_assoc()) {
                        $counter++;
                        echo '<div class="col-md-3 col-sm-6">';
                        echo  '<div class="card">';
                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal' . $counter . '">';
                        $imagePaths = explode(';', $fila["image_path"]);
                        $firstImagePath = reset($imagePaths); // Obtiene la primera ruta
                        echo '<img src="' . $firstImagePath . '" alt="" class="img-thumbnail">';
                        echo '</a>';
                        echo '<div class="card-body d-flex flex-column justify-content-center">';
                        echo  '<h5 class="card-title">' . $fila["name"] . '</h5>';
                        echo '<p>'.$fila["description"].' </p>';
                        echo '</div>';
                        echo '</div>';
                        echo ' </div>';

                        //<!-- modal1-->
                        echo '<div class="modal fade" id="galleryModal' . $counter . '" tabindex="-1" aria-labelledby="galleryModalLabel' . $counter . '" aria-hidden="true">';
                        echo ' <div class="modal-dialog modal-lg">';
                        echo ' <div class="modal-content">';
                        echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="galleryModalLabel' . $counter . '">Galería de Imágenes</h5>';
                        echo ' <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>';
                        echo '</div>';
                        echo '<div class="modal-body custom-modal-body">';
                        echo '<div id="carousel' . $counter . '" class="carousel slide mb-2" data-bs-ride="carousel">';
                        echo ' <div class="carousel-inner">';
                        $imagePaths = explode(';', $fila["image_path"]);
                        foreach ($imagePaths as $index => $imagePath) {
                            echo '<div class="carousel-item ' . ($index === 0 ? 'active' : '') . '">';
                            echo '<img src="' . $imagePath . '" alt="Imagen ' . ($index + 1) . '" class="d-block w-100">';
                            echo '</div>';
                        }
                        //<!-- Agrega más elementos de carrusel para más imágenes -->
                        echo ' </div>';
                        echo '<button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $counter . '" data-bs-slide="prev">';
                        echo ' <span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                        echo '<span class="visually-hidden">Anterior</span>';
                        echo '</button>';
                        echo ' <button class="carousel-control-next" type="button" data-bs-target="#carousel' . $counter . '" data-bs-slide="next">';
                        echo ' <span class="carousel-control-next-icon" aria-hidden="true"></span>';
                        echo '<span class="visually-hidden">Siguiente</span>';
                        echo '</button>';
                        echo '</div>';
                        echo '</div>';
                        echo ' </div>';
                        echo ' </div>';
                        echo '</div>';
                    }
                } else {
                    echo "No se encontraron datos en la tabla 'tendencia'.";
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Selecciona todos los elementos con la clase "carousel" y inicializa los carruseles
                const carousels = document.querySelectorAll('.carousel');
                carousels.forEach(function(carousel) {
                    new bootstrap.Carousel(carousel);
                });
            });
        </script>
        <!-- Asegúrate de cargar jQuery antes de Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

    </body>

    </html>

</body>

</html>