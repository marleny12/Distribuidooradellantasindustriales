<?php 
  include 'conexion.php';
  $sql = "SELECT DISTINCT rin FROM products ORDER BY rin ASC";
  $result = $conn->query($sql);

  // Inicializa un arreglo para almacenar las opciones de rin
  $rinOptions = [];

  if ($result->num_rows > 0) {
      // Recorre los resultados y agrega las opciones al arreglo
      while ($row = $result->fetch_assoc()) {
          $rinOptions[] = $row['rin'];
      }
  } else {
      echo "No se encontraron opciones de perfil en la base de datos.";
  }

  // Cierra la conexión a la base de datos
  $conn->close();
?>