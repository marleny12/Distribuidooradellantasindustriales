<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Estilos para las filas */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
            margin-top: 3px;
        }

        /* Estilos para las columnas */
        .col {
            flex: 1;
            padding: 0 10px;
        }

        /* Estilos para el encabezado */
        h1 {
            font-size: 30px;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Estilos para el botón */
        .btn {
            background-color: #d9534f;
            color: #fff;
            border: none;
            padding: 10px 40px;
            cursor: pointer;
            ;
            border-radius: 5px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            /* Centrar horizontalmente */
        }

        .btn:hover {
            background-color: #c9302c;
            /* Color diferente al pasar el cursor */
        }


        /* Estilos para el texto justificado */
        .text-justify {
            text-align: justify;
            font-size: large;
        }

        /* Estilos para la imagen */
        .imagen {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }


        video {
            max-width: 100%;
            height: auto;
        }

        .slider {
            width: 100%;
            overflow: hidden;
        }

        .slides {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slides li {
            flex: 0 0 100%;
        }

        .slides img {
            width: 100%;
            height: auto;
        }

        .prev,
        .next {
            background-color: #007BFF;
            /* Color de fondo del botón */
            color: #fff;
            /* Color del texto del botón */
            border: none;
            /* Sin borde */
            padding: 10px 20px;
            /* Espaciado interno del botón */
            margin: 5px;
            /* Margen entre los botones */
            cursor: pointer;
            /* Cursor de puntero al pasar el ratón */
            border-radius: 5px;
            /* Bordes redondeados */
            font-size: 16px;
            /* Tamaño del texto */
        }

        /* Estilos para el botón "Anterior" al pasar el cursor sobre él */
        .prev:hover {
            background-color: #0056b3;
            /* Cambia el color de fondo al pasar el cursor */
        }

        /* Estilos para el botón "Siguiente" al pasar el cursor sobre él */
        .next:hover {
            background-color: #0056b3;
            /* Cambia el color de fondo al pasar el cursor */
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            /* Ajusta el espacio vertical si es necesario */
        }

        .formulario-comentario {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: 20px;
            /* Margen izquierdo */
            margin-right: 20px;
            margin-top: 20px;
            background-color: #EBF5FB;
        }

        /* Estilo para los campos de entrada */
        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .comentario {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            width: 100%;
            background-color: #E8F6F3;
        }

        /* Estilo para el nombre del autor */
        .comentario h3 {
            font-size: 16px;
            color: #333;
            margin: 0;
        }

        /* Estilo para el texto del comentario */
        .comentario p {
            font-size: 14px;
            color: #555;
            margin-top: 10px;

        }

        /* Contenedor principal de comentarios */
        .comentarios-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #D4E6F1;
            justify-content: center;
            /* Añade esta línea para centrar verticalmente */
            max-width: 100%;


        }

        input,
        textarea {
            background-color: #F2F4F4;
        }

        @media (max-width: 768px) {
            .comentarios-container {
                flex-direction: column;
                /* Cambia a una columna */
            }

            .comentario {
                width: 100%;
                background-color: #EAF2F8;
            }
        }

        .icon-input {
            font-family: 'Font Awesome 5 Free';
            /* Asegúrate de que la fuente de iconos esté cargada */
            padding-left: 30px;
            /* Espacio a la izquierda para el icono */
            background-image: none;
            /* Elimina cualquier imagen de fondo predeterminada */
        }

        /* Estilos adicionales para el icono */
        .icon-input::before {
            content: "\f27a";
            /* Código Unicode del icono */
            position: absolute;
            left: 10px;
            /* Ajusta la posición horizontal del icono */
            top: 50%;
            /* Ajusta la posición vertical del icono */
            transform: translateY(-50%);
            font-size: 16px;
            /* Ajusta el tamaño del icono */
            color: #555;
            /* Ajusta el color del icono */
        }
    </style>
</head>

<body>
    <?php
    include 'componentes/nav.php';
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Alienacion y Balanceo</h1>
            </div>
            <div class="btn-container">
                <a href="agenda.php" type="button" class="btn"><i class="fa fa-calendar" aria-hidden="true"></i> Agendar cita </a>
            </div>
        </div>
        <br>
        <div class="container text-justify ">
            <div class="row">
                <div class="col">
                    La alineación de ruedas es un procedimiento de mantenimiento esencial en la industria automotriz que se realiza para asegurar que las
                    ruedas de un vehículo esté correctamente alineado en relación con los componentes de la suspensión y la dirección. Esto implica ajustar
                    los ángulos de las ruedas para que estén en posición recta y paralelas entre sí cuando el vehículo está en movimiento. Los tres ángulos
                    principales que se ajustan durante la alineación son el camber, el caster y el toe.El camber se refiere al ángulo vertical
                    de las ruedas en relación con la superficie de la carretera. Un camber incorrecto puede provocar un desgaste irregular de los neumáticos,
                    afectará la tracción y la estabilidad del vehículo y causará problemas de manejo.
                </div>
                <div class="col">
                    <video controls width="540" height="360">
                        <source src="imagenes/video1.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="slider">
                <ul class="slides">
                    <li><img class="imagen" src="imagenes/service/alineacion.png" alt="Imagen 1"></li>
                    <li><img class="imagen" src="imagenes/service/beneficios.png" alt="Imagen 2"></li>
                </ul>
                <div class="button-container">
                    <button class="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                    <button class="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>

            </div>
        </div>

        <div class="comentarios-container">
           
        </div>
        <div class="formulario-comentario">
            <div class="row">
                <div class="col">
                    <h2>Deja un comentario</h2>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" required placeholder=" Escribe tu nombre" class="icon-input">
                        </div>
                        <div class="form-group">
                            <label for="comentario">Comentario:</label>
                            <textarea name="comentario" id="comentario" rows="4" required placeholder="&#xf27a; Escribe algo" class="icon-input"></textarea>
                        </div>
                        <button type="submit" class="btn">Enviar comentario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    <?php include 'componentes/footer.php' ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.slider');
            const slides = document.querySelector('.slides');
            const slideWidth = slides.firstElementChild.clientWidth;
            let currentIndex = 0;

            function slideTo(index) {
                if (index < 0 || index >= slides.children.length) return;
                currentIndex = index;
                slides.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
            }

            // Avanzar al siguiente slide
            function nextSlide() {
                slideTo(currentIndex + 1);
            }

            // Retroceder al slide anterior
            function prevSlide() {
                slideTo(currentIndex - 1);
            }

            // Manejar eventos de botones de navegación
            document.querySelector('.next').addEventListener('click', nextSlide);
            document.querySelector('.prev').addEventListener('click', prevSlide);

            // Iniciar el slider en el primer slide
            slideTo(0);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const comentariosContainer = document.querySelector('.comentarios-container');

            // Función para cargar los comentarios
            function cargarComentarios() {
                fetch('comentarios.php') // Reemplaza con la URL correcta para obtener los comentarios desde el servidor
                    .then(response => response.json())
                    .then(data => {
                        comentariosContainer.innerHTML = ''; // Limpiar comentarios existentes
                        data.forEach(comentario => {
                            const comentarioElement = document.createElement('div');
                            comentarioElement.classList.add('comentario');
                            comentarioElement.innerHTML = `
                        <h3> <i class="fa fa-user" aria-hidden="true"></i> ${comentario.nombre}</h3>
                        <p> <i class="fa fa-comments" aria-hidden="true"></i> ${comentario.comentario}</p>
                        <p class='fecha'> <i class="fa fa-calendar" aria-hidden="true"></i> ${comentario.fecha}</p>
                    `;
                            comentariosContainer.appendChild(comentarioElement);
                        });
                    });
            }

            // Cargar comentarios al cargar la página
            cargarComentarios();

            // Manejar el envío del formulario de comentarios
            const formulario = document.querySelector('.formulario-comentario form');
            formulario.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(formulario);
                fetch('save_comentario.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            cargarComentarios(); // Actualizar comentarios después de agregar uno nuevo
                            formulario.reset(); // Limpiar el formulario
                        } else {
                            alert('Error al guardar el comentario.');
                        }
                    });
            });
        });
    </script>
</body>

</html>