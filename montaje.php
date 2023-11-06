<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Estilos para el contenedor principal */
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
            text-align: center;
        }

        .col-1 {
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

        ul {


            list-style: none;
            padding-left: 0;
            /* Para eliminar el espacio izquierdo */
        }

        /* Estilo para el icono */
        li i {


            margin-right: 5px;
            /* Agrega un espacio entre el icono y el texto si es necesario */
        }

        .colored-title {
            color: #FF0000;
            /* Cambia el color del texto a rojo (#FF0000) */
        }

        .colored-title i {
            color: #00FF00;
            /* Cambia el color del ícono a verde (#00FF00) */
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
                <h1>Servicio de Montaje, Reparaciòn y Cambio de aceite </h1>
            </div>
            <div class="btn-container">
                <a href="agenda.php" type="button" class="btn"><i class="fa fa-calendar" aria-hidden="true"></i> Agendar cita </a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                <h2>En la compra de 1 o mas llantas el Servicio de montaje es <img src="imagenes/service/gratis.png" alt=""> </h2>
            </div>
        </div>
        <br>
        <div class="container ">
            <div class="row">
                <div class="col-1">
                    <h2>Te Ofrecemos..</h2>
                    <ul>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Desmontaje de la llanta usada.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Montaje de la nueva llanta(Todos las medidas).</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Remplazo de vàlvulas.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Alineacion y Balanceo (Costo extra).</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Inflado de llantas.</li>
                    </ul>


                </div>
                <div class="col">
                    <h2 class="colored-title"><i class="fa fa-map-marker" aria-hidden="true"></i> Localizar Taller</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3786.5124265962745!2d-97.25688792481205!3d18.36951518269496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5b7fc4ede893b%3A0x2d6aa2dcad93f80c!2sDistribuidora%20de%20Llantas%20Industriales!5e0!3m2!1ses-419!2smx!4v1695051919431!5m2!1ses-419!2smx" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>
        <div class="container ">
            <div class="row">
                <div class="col-1">
                    <h2>REPARACIÒN DE LLANTAS </h2>
                    <br>
                    <h3>¿Como funciona?</h3>
                    <br>
                    <P class="text-justify">El proceso de reparación de una llanta puede variar en función del daño, pero en líneas generales se compone de desmontaje, limpieza, rellenado de material, torneado.</P>
                </div>
            </div>


        </div>
        <div class="container ">
            <div class="row">
                <div class="col-1">
                    <h2>CAMBIO DE ACEITE  </h2>
                    <br>
                    <h3>BENEFICIOS</h3>
                    <br>
                    <P class="text-justify">Reemplazar el aceite del motor es crucial para mantener un alto rendimiento. Por lo tanto, puede ser una de las cosas más importantes que haga para mantener su carro en buenas condiciones de funcionamiento.</P>
                </div>
            </div>


        </div>

        <div class="comentarios-container">
            <!-- Los comentarios se mostrarán aquí -->
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