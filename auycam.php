<?php session_start(); ?>
<?php
define('PRODUCTS_PER_PAGE', 9);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * PRODUCTS_PER_PAGE; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Productos Interactivos</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye jQuery antes de Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .page-link {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }

        .page-link.active {
            background-color: #112d4e;
            color: #fff;
        }

        /* styles.css */
        body {
            font-family: Arial, sans-serif;
        }

        #search-box {
            width: 300px;
            padding: 10px;
        }

        #results {
            list-style: none;
            padding: 0;
        }

        #results li {
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include 'componentes/nav.php'; ?>

    <main>
        <div class="container mt-3">
          

            <div class="row" id="mosaic-gallery">
                <?php include 'category/product.php' ?>
                <?php foreach (array_slice($products, $start, PRODUCTS_PER_PAGE) as $index => $product) : ?>
                    <div class="col-md-4 product-content" data-toggle="modal" data-target="#productModal<?php echo $index; ?>" data-product-index="<?php echo $index; ?>">
                        <img src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p>Precio: <?php echo $product['price']; ?></p>
                        <p><?php echo $product['marca']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>


            <?php foreach (array_slice($products, $start, PRODUCTS_PER_PAGE) as $index => $product) : ?>
                <div class="modal fade" id="productModal<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img id="modal-image<?php echo $index; ?>" src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                         <h3 id="modal-product-name<?php echo $index; ?>"><?php echo $product['name']; ?></h3>
                                        <p id="modal-product-description<?php echo $index; ?>"><?php echo $product['marca']; ?></p>
                                        <p id="modal-product-price<?php echo $index; ?>">Precio: <?php echo $product['price']; ?></p>
                                        <form method="post" action="procesar_carrito.php">
                                            <input type="hidden" name="product-img" value="<?php echo $product['images'][0]; ?>">
                                            <input type="hidden" name="product-name" value="<?php echo $product['name']; ?>">
                                            <input type="hidden" name="product-price" value="<?php echo $product['price']; ?>">
                                            <input type="hidden" name="product-index" value="<?php echo $index; ?>">
                                            <div class="form-group" id="quantity-input-group<?php echo $index; ?>">
                                                <label for="quantity<?php echo $index; ?>">Cantidad:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-secondary decrease-quantity" data-target="#quantity<?php echo $index; ?>" type="button">-</button>
                                                    </div>
                                                    <input type="text" name="quantity" id="quantity<?php echo $index; ?>" class="form-control text-center" value="1" min="1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary increase-quantity" data-target="#quantity<?php echo $index; ?>" type="button">+</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" name="add-to-cart" class="btn btn-danger">Agregar al carrito</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div id="product-thumbnails<?php echo $index; ?>" class="d-flex flex-wrap">
                                    <!-- Aquí se generarán las miniaturas de imágenes del producto -->
                                    <?php foreach ($product['images'] as $imageIndex => $image) : ?>
                                        <div class="thumbnail" style="background-image: url(<?php echo $image; ?>);" data-thumbnail-index="<?php echo $imageIndex; ?>" data-image-url="<?php echo $image; ?>"></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


            <div class="pagination">
                <?php
                $totalPages = ceil(count($products) / PRODUCTS_PER_PAGE);
                for ($i = 1; $i <= $totalPages; $i++) {
                    $isActive = ($i == $page) ? 'active' : '';
                    echo "<a class='page-link $isActive' href='?page=$i'>$i</a>";
                }
                ?>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="carrot.js"></script>
        <script>
            $(document).ready(function() {

                $('.product-content').on('click', function() {
                    const index = $(this).data('product-index');
                });


                $('.thumbnail').on('click', function() {
                    const thumbnailIndex = $(this).data('thumbnail-index');
                    const modalId = $(this).closest('.modal').attr('id');
                    const index = modalId.replace('productModal', '');
                    const modalImage = $('#modal-image' + index);
                    const newImageSrc = $(this).data('image-url');
                    modalImage.attr('src', newImageSrc);
                });

                // lógica para incrementar y decrementar la cantidad
                $('.btn-outline-secondary').on('click', function() {
                    const quantityInput = $($(this).data('target'));
                    const currentQuantity = parseInt(quantityInput.val());

                    if ($(this).hasClass('decrease-quantity')) {
                        if (currentQuantity > 1) {
                            quantityInput.val(currentQuantity - 1);
                        }
                    } else if ($(this).hasClass('increase-quantity')) {
                        quantityInput.val(currentQuantity + 1);
                    }
                });
            });
        </script>
    




    </main>
    <br><br>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
</body>

</html>