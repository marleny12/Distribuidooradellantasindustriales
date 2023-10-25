<?php
include 'conexion.php';
function formato($fecha){
    return date ('g:i:a',strtotime($fecha));
}

$sql = "SELECT * FROM chat ORDER BY id DESC";
$result = $conn->query($sql);
while ($fila = $result->fetch_array()) :
?>
    <div id="datos-chat">
        <span style="color:#1c62c4"><?php echo $fila['nombre'] ?></span>
        <span style="color:#848484"><?php echo $fila['mensaje'] ?></span>
        <span style="float:right"><?php echo formato($fila['fecha']);  ?></span>
    </div>
<?php endwhile; ?>