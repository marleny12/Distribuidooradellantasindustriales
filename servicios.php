<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .slider-container {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .slider {
            display: flex;
            transition: transform 0.3s ease-in-out;
        }

        .product {
            flex: 0 0 300px;
            margin-right: 25px;
            padding: 15px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
    flex-direction: column; 
    justify-content: space-between;
        }

        /* Estilos para los botones de navegación */
        .nav-btn {
            cursor: pointer;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        /* Estilos para los botones de navegación */
        .nav-btn {
            background-color: #164884;

        }

        /* Estilos para el botón "Anterior" */
        .prev-btn {
            background-color: #FC001B;
            /* Color rojo */
        }

        /* Estilos para el botón "Siguiente" */
        .next-btn {
            background-color: #FC001B;
            /* Color verde */
        }

        .nav-btn:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
        
        .product img {
    max-width: 100%; /* Para que la imagen se ajuste al ancho de la tarjeta */
}

.button-container {
    margin-top: auto; /* Empuja los botones hacia la parte inferior de la tarjeta */
    display: flex;
    justify-content: center;
}
h3{
    text-align: center;
}
p{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    text-align: justify;
}


    </style>
</head>

<body>
    <div class="container mt-5">
        <h3>SERVICIOS</h3>
        <div class="slider-container">
            <div class="slider">
                <?php include 'conexion.php';
                 $consulta = "SELECT * FROM service";
                 $resultado = $conn->query($consulta);
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                echo'<div class="product">';
                echo'<img src="' . $fila["image_path"] . '" class="img-thumbnail" alt="producto1">';
                echo'<h3>' . $fila["name"] . '</h3>';
                echo'<p>' . $fila["description"] . '</p>';
                echo' <div class="button-container mt-3">';
                    echo' <a href="' . $fila["button_ruta"] . '" class="btn btn-primary align-self-center">Mas Informacion</a>';
                    echo'</div>';

                echo'</div>';
                    }
                }
                ?>
            </div>
        </div>
        <br>
        <!-- Botones de navegación -->
        <div class="button-container">
            <button class="nav-btn prev-btn btn-danger">Anterior</button>
            <button class="nav-btn next-btn btn-danger">Siguiente</button>
        </div>
    </div>





</body>
<script>
    const slider = document.querySelector('.slider');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let translateX = 0;

    prevBtn.addEventListener('click', () => {
        if (translateX < 0) {
            translateX += 340; // Ajusta este valor según el ancho del producto + margen
            slider.style.transform = `translateX(${translateX}px)`;
        }
    });

    nextBtn.addEventListener('click', () => {
        const containerWidth = slider.parentElement.clientWidth;
        const contentWidth = slider.scrollWidth;

        if (translateX > containerWidth - contentWidth) {
            translateX -= 340; // Ajusta este valor según el ancho del producto + margen
            slider.style.transform = `translateX(${translateX}px)`;
        }
    });

</script>

</html>
