<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="header-content">
            <img src="imagenes/2.png" alt="" class="logo">
            <h1 class="header-title">Distribuidora de llantas industriales</h1>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
            <li class="submenu-trigger"><a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> Catalogo </a>
                <ul class="submenu">
                    <li><a href="auycam.php">Auto y Camioneta</a></li>
                    <li><a href="camionetas.php">Camioneta</a></li>
                    <li><a href="camiones.php">Camiones</a></li>
                    <li><a href="tractores.php">Tractores</a></li>
                </ul>
            </li>
            <li class="submenu-trigger"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Complementos </a>
                <ul class="submenu">
                    <li><a href="auycam.php">Camaras</a></li>
                    <li><a href="camiones.php">Rines</a></li>
                    <li><a href="complementos.php">Valbula</a></li>
                </ul>
            </li>

            <li class="submenu-trigger"><a href="#"><i class="fa fa-wrench" aria-hidden="true"></i> Servicios</a>
                <ul class="submenu">
                    <li><a href="alineacion.php">Alineacion y Balanceo</a></li>
                    <li><a href="montaje.php">Servicio de Montaje, reparación y cambio de aceite</a></li>
                </ul>
            </li>
            <li><a href="contacto.php"><i class="fa fa-address-book" aria-hidden="true"></i> Contacto</a></li>
            <li><a href="agenda.php"><i class="fa fa-calendar" aria-hidden="true"></i> Agenda Tu Cita </a></li>
            <li><a href="mostrar_carrito.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

        </ul>
        <div class="hide">
            <i class="fa fa-bars" aria-hidden="true"></i> Menu
        </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(".hide").on('click', function() {
            $("nav ul").toggle('slow');
        })

        $(".submenu-trigger > a").on('click', function(e) {
            e.preventDefault();
            $(this).siblings(".submenu").slideToggle('fast');
        });
    </script>
</body>

</html>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
    }

    header {
        width: 100%;
        padding: 30px;
        color: white;
        text-align: center;
        background: #112d4e;
    }

    nav ul {
        background: #164884;
        text-align: center;
        list-style: none;
        overflow: hidden;

    }

    ul li {
        display: inline-block;
        padding: 20px;
        transition: all ease-in-out 250ms;
    }

    ul li:hover {
        background: #112d4e;
    }

    ul li a {
        color: white;
        text-decoration: none;
    }

    .hide {
        padding: 16px;
        font-size: 22px;
        background: #112d4e;
        color: white;
        cursor: pointer;
        display: none;
    }

    @media (max-width: 768px) {
        ul li {
            width: 100%;
            padding: 15px;
            text-align: left;
        }

        .hide {
            display: block;
        }

        nav ul {
            display: none;

        }
    }

    .submenu {
        display: none;
        position: relative;
        background: #164884;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .submenu li {
        padding: 10px;
    }

    .submenu li:hover {
        background: #112d4e;
    }

    .submenu li a {
        color: white;
        text-decoration: none;
    }

    header {
        background-color: #112d4e;
        color: white;
        padding: 20px;
        text-align: center;
        /* Alinea el texto horizontalmente en el centro */
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: center;
        /* Alinea los elementos horizontalmente en el centro */
    }

    .logo {
        max-width: 100px;
        margin-right: 20px;
    }

    .header-title {
        margin: 0;
        /* Elimina el margen superior e inferior del título */
    }
</style>