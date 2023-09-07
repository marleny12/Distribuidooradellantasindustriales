<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Productos Interactivos</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos para los mosaicos de productos */
        .product-content {
            cursor: pointer;
            padding: 20px;
            border: 1px solid #ccc;
            transition: transform 0.2s;
        }

        .product-content img {
            max-width: 100%;
        }

        .product-content:hover {
            transform: scale(1.05);
        }

        /* Estilos para las miniaturas de imágenes en el modal */
        .thumbnail {
            width: 80px;
            height: 80px;
            margin: 5px;
            background-size: cover;
            cursor: pointer;
        }

        .thumbnail:hover {
            border: 2px solid #007bff;
        }
    </style>
</head>

<body>
    <?php include 'componentes/nav.php'; ?>

    <main>
        <div class="container">
            <div class="row" id="mosaic-gallery">
                <!-- Aquí se generarán los mosaicos de productos -->
            </div>
        </div>

        <!-- Modal para mostrar la imagen ampliada -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img id="modal-image" src="" alt="">
                            </div>
                            <div class="col-md-6">
                                <h3 id="modal-product-name"></h3>
                                <p id="modal-product-description"></p>
                                <button id="add-to-cart-button" class="btn btn-danger">Agregar al carrito</button>
                                <!-- Agrega el campo de entrada de cantidad aquí -->

                                <div class="form-group" id="quantity-input-group">
                                    <label for="quantity">Cantidad:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="decrease-quantity">-</button>
                                        </div>
                                        <input type="" id="quantity" class="form-control text-center" value="1" min="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="increase-quantity">+</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="product-thumbnails" class="d-flex flex-wrap">
                            <!-- Aquí se generarán las miniaturas de imágenes del producto -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enlace a Bootstrap JS y jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>

            $(document).ready(function () {
                const products = [
                    {
                        name: 'Producto 1',
                        price: '$100',
                        description: 'Descripción del Producto 1',
                        images: ['imagenes/image1.jpg', 'imagenes/image2.jpg', 'imagenes/image3.jpg', 'imagenes/image2.jpg', 'imagenes/image3.jpg']
                    },
                    {
                        name: 'Producto 2',
                        price: '$150',
                        description: 'Descripción del Producto 2',
                        images: ['producto2-1.jpg', 'producto2-2.jpg', 'producto2-3.jpg']
                    }
                ];

                function createProducts() {
                    const galleryContainer = $('#mosaic-gallery');

                    products.forEach(product => {
                        const mosaicItem = document.createElement('div');
                        mosaicItem.classList.add('col-md-4', 'product-content');
                        mosaicItem.innerHTML = `
        <img src="${product.images[0]}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>Precio: ${product.price}</p>
        <p>${product.description}</p>
      `;

                        mosaicItem.addEventListener('click', () => {
                            const modalImage = $('#modal-image');
                            modalImage.attr('src', product.images[0]);

                            const modalProductName = $('#modal-product-name');
                            modalProductName.text(product.name);

                            const modalProductDescription = $('#modal-product-description');
                            modalProductDescription.text(product.description);

                            const thumbnailContainer = $('#product-thumbnails');
                            thumbnailContainer.empty();

                            product.images.forEach((image, index) => {
                                const thumbnail = $('<div class="thumbnail"></div>');
                                thumbnail.css('background-image', `url('${image}')`);

                                thumbnail.on('click', () => {
                                    modalImage.attr('src', image);
                                });

                                thumbnailContainer.append(thumbnail);
                            });

                            const addToCartButton = $('#add-to-cart-button');
                            // Agregar lógica para el botón de agregar al carrito o comprar aquí

                            $('#productModal').modal('show');
                        });

                        galleryContainer.append(mosaicItem);
                    });
                }

                createProducts();
            });


            // Agregar lógica para incrementar la cantidad
            document.getElementById('increase-quantity').addEventListener('click', () => {
                const quantityInput = document.getElementById('quantity');
                const currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
            });

            // Agregar lógica para decrementar la cantidad
            document.getElementById('decrease-quantity').addEventListener('click', () => {
                const quantityInput = document.getElementById('quantity');
                const currentQuantity = parseInt(quantityInput.value);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                }
            });


        </script>
    </main>
    <br><br>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>


</body>

</html>
