<?php 
include 'conexion.php';
function formato($fecha){
    return date ('g:i:a',strtotime($fecha));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">
    <script type="text/javascript">
        function ajax (){
            var req = new XMLHttpRequest();

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    document.getElementById('chat').innerHTML = req.responseText;
               
                }
            }
            req.open('GET','chat.php',true);
            req.send();
        }

        //refresque la pagina 
        setInterval(function(){ajax();},1000)
    </script>
    <title>chat</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            border: 0;
        }

        body {
            background: #972247;
        }

        .container {
            width: 40%;
            background: #fff;
            margin: 0 auto;
            padding: 20px;
            border-radius: 12px;
            -moz-border-radius: 12px;
            -o-border-radius: 12px;
            -webkit-border-radius: 12px;

        }

        #caja-chat {
            width: 90%;
            height: 400px;
        }

        #datos-chat {
            width: 100%;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 1px solid silver;
            font-weight: bold;
            font-family: 'Mukta Vanni', sans-serif;

        }

        input[type='text'] {
            width: 100%;
            height: 40px;
            border: 1px solid gray;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            -webkit-border-radius: 5px;

        }

        input[type='submit'] {
            width: 100%;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            height: 40px;
            border: 1px solid gray;
            -webkit-border-radius: 5px;
            cursor: pointer;

        }

        textarea{
            width: 100%;
            height: 40px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            -webkit-border-radius: 5px;
            
        }
        input, textarea{
            margin-bottom: 3px;
        }
    </style>
</head>

<body onload="ajax();">
    <div class="container">
        <div id="caja-chat">
            <div id="chat">
               
            </div>
        </div>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="ingresa tu nombre">
            <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
            <input type="submit" name="enviar" value="Enviar">

        </form>

        <?php 
          if (isset($_POST['enviar'])) {
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['mensaje'];

            $sql=" INSERT INTO chat (nombre,mensaje) VALUES('$nombre','$mensaje')";
                $result= $conn ->query($sql);
                if ($result) {
                    echo "<embed loop='false' src='16091.mp3' hidden ='true' autoplay='true";
                }
          }
        
        
        ?>
    </div>
    <audio id="newMessageSound" src="16091.mp3"></audio>

  
</body>

</html>