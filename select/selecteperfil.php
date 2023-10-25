<?php 
  include 'conexion.php';
  $sql = "SELECT DISTINCT perfil FROM products ORDER BY perfil ASC";
  $result = $conn->query($sql);

  // Inicializa un arreglo para almacenar las opciones de perfil
  $perfilOptions = [];

  if ($result->num_rows > 0) {
      // Recorre los resultados y agrega las opciones al arreglo
      while ($row = $result->fetch_assoc()) {
          $perfilOptions[] = $row['perfil'];
      }
  } else {
      echo "No se encontraron opciones de perfil en la base de datos.";
  }

  // Cierra la conexión a la base de datos
  $conn->close();
?>