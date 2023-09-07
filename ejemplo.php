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
                max-width: 80%; /* Ajusta el ancho según tus necesidades */
                max-height: 80vh; /* Ajusta la altura según tus necesidades */
                   }
                          }



            .tendencia {
            margin-right: 20px; /* Margen derecho por defecto */
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        @media (max-width: 768px) {
            /* Estilos para pantallas más pequeñas */
            .tendencia {
                margin-right: 0; /* Elimina el margen derecho */
                margin-bottom: 10px; /* Agrega margen inferior para separar elementos */
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
                
                <div class="col-md-3 col-sm-6">
                    <div class="card" >
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <img src="imagenes/image1.jpg" alt="Imagen 1" class="img-thumbnail">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">$5,000.00</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal2">
                            <img src="imagenes/image2.jpg" alt="Imagen 2" class="img-thumbnail">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">$5,000.00</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal3">
                            <img src="imagenes/image3.jpg" alt="Imagen 2" class="img-thumbnail">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">$5,000.00</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <img src="imagenes/image3.jpg" alt="Imagen 2" class="img-thumbnail">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">$5,000.00</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- modal1-->
        <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalLabel">Galería de Imágenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="imagenes/image4.jpg" alt="Imagen 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/image6.jpg" alt="Imagen 2" class="d-block w-100">
                                </div>
                                <!-- Agrega más elementos de carrusel para más imágenes -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title ">Descripcion y Caracteristicas</h5>
                            <br>
                            <p class="card-text text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam aliquam sapiente distinctio eum odit veniam natus possimus maiores, sed aspernatur inventore eos perspiciatis quasi sunt omnis laborum voluptas cum temporibus.</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal2-->
        <div class="modal fade" id="galleryModal2" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalLabel">Galería de Imágenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div id="imageCarousel2" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="imagenes/img1.png" alt="Imagen 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/image6.jpg" alt="Imagen 2" class="d-block w-100">
                                </div>
                                <!-- Agrega más elementos de carrusel para más imágenes -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel2"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel2"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title ">Descripcion y Caracteristicas</h5>
                            <br>
                            <p class="card-text text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam aliquam sapiente distinctio eum odit veniam natus possimus maiores, sed aspernatur inventore eos perspiciatis quasi sunt omnis laborum voluptas cum temporibus.</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal3-->
        <div class="modal fade" id="galleryModal3" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalLabel">Galería de Imágenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div id="imageCarousel3" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="imagenes/img1.png" alt="Imagen 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/image1.jpg" alt="Imagen 2" class="d-block w-100">
                                </div>
                                <!-- Agrega más elementos de carrusel para más imágenes -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel3"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel3"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title ">Descripcion y Caracteristicas</h5>
                            <br>
                            <p class="card-text text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam aliquam sapiente distinctio eum odit veniam natus possimus maiores, sed aspernatur inventore eos perspiciatis quasi sunt omnis laborum voluptas cum temporibus.</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal4-->
        <div class="modal fade" id="galleryModal4" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalLabel">Galería de Imágenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div id="imageCarousel4" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="imagenes/img1.png" alt="Imagen 1" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/image1.jpg" alt="Imagen 2" class="d-block w-100">
                                </div>
                                <!-- Agrega más elementos de carrusel para más imágenes -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel4"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next " type="button" data-bs-target="#imageCarousel4"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title ">Descripcion y Caracteristicas</h5>
                            <br>
                            <p class="card-text text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam aliquam sapiente distinctio eum odit veniam natus possimus maiores, sed aspernatur inventore eos perspiciatis quasi sunt omnis laborum voluptas cum temporibus.</p>
                            <a href="#" class="btn btn-danger align-self-center">Agregar A Carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                new bootstrap.Carousel(document.getElementById("imageCarousel"));
                new bootstrap.Carousel(document.getElementById("imageCarousel2"));
                new bootstrap.Carousel(document.getElementById("imageCarousel3"));
                new bootstrap.Carousel(document.getElementById("imageCarousel4"));
            });
        </script>
    </body>

    </html>

</body>

</html>
