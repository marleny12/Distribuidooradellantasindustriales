<?php 
  include 'conexion.php';
  $sql = "SELECT DISTINCT ancho FROM products ORDER BY ancho ASC";
  $result = $conn->query($sql);

  // Inicializa un arreglo para almacenar las opciones de ancho
  $anchoOptions = [];

  if ($result->num_rows > 0) {
      // Recorre los resultados y agrega las opciones al arreglo
      while ($row = $result->fetch_assoc()) {
          $anchoOptions[] = $row['ancho'];
      }
  } else {
      echo "No se encontraron opciones de perfil en la base de datos.";
  }

  // Cierra la conexión a la base de datos
  $conn->close();
?>