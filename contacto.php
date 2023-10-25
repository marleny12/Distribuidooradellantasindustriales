<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 50px auto;
            /* Margen superior e inferior centrado; margen izquierdo y derecho automáticos */
            max-width: 600px;
            /* Ancho máximo del contenedor para que no sea demasiado ancho */

        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px 15px;
            /* Ajusta el padding izquierdo y derecho */
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;

        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;

        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<?php include './componentes/nav.php'; ?>
    <br>
    <h1>Si deseas mas informacion Contactanos</h1>

    <div class="container">
        <div class="form">
            <form action="" method="POST">
                <label for="nombre">Nombre: *</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Telefono: *</label>
                <input type="text" id="telefono" name="telefono" required>

                <label for="email">Correo electrónico: *</label>
                <input type="email" id="email" name="email" required>

                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" >

                <label for="mensaje">Mensaje: *</i></label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $tel = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];
    $ciudad = $_POST["ciudad"];

    include 'conexion.php';


    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $con->connect_error);
    }

    // Prepara la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO mensajes (nombre, email, tel, mensaje, ciudad) VALUES ('$nombre', '$email', '$tel', '$mensaje','$ciudad')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Grcias por contactanos..!!! ";
    } else {
        echo "" . mysqli_error($conn);
    }
}
?>
<br>
                <input type="submit" value="Enviar" >
            </form>
        </div>
    </div>

    <br>
    <?php include './componentes/footer.php'; ?>

    
</body>
</html>
