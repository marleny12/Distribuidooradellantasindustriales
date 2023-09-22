<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Catalogo de llantas</title>
</head>

<body>

    <?php
    include 'componentes/nav.php';
    ?>

    <main>
        <?php
        include 'componentes/carrusel.php';
        ?>
        <?php
        include 'targetas.php';
        ?>
        <br><br>

        <?php
        include 'servicios.php';
        ?>
        <br>

        <div class="container text-center">
            <h2>Conoce Nuestras Marcas</h2>
            <div class="row">
                <div class="col">
                    <img src="imagenes/torque.png" alt="" width="200" height="100">
                </div>
                <div class="col">
                    <img src="imagenes/gentire.jpg" alt="" width="200" height="100">
                </div>
                <div class="col">
                    <img src="imagenes/2003.png" alt="" width="200" height="100">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <img src="imagenes/goodyear.jpg" alt="" width="200" height="100">
                </div>
                <div class="col">
                    <img src="imagenes/Sailun.jpg" alt="" width="200" height="100">
                </div>
                <div class="col">
                    <img src="imagenes/pirelli.png" alt="" width="200" height="100">
                </div>
            </div>
        </div>

    </main>
<br>
    <footer>
        <?php
        include 'componentes/footer.php';
        ?>
    </footer>






</body>

</html>