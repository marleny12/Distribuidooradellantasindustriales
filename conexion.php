<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "dllantas";

 $conn = mysqli_connect($servername, $username, $password, $dbname);

 if (mysqli_connect_error()) {
    echo 'no se pudo conectar ala base';
 }else {
    //echo'exito';
 }
 ?>
