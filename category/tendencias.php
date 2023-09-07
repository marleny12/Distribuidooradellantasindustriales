<?php
          
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "dllantas";
          
          // Crear conexión
          $conn = new mysqli($servername, $username, $password, $database);
          
          // Verificar la conexión
          if ($conn->connect_error) {
              die("Conexión fallida: " . $conn->connect_error);
          }
          
          // Consulta para obtener las imágenes de la tabla 'tendencias'
          $sql = "SELECT * FROM tendency";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              $imagenes = array(); // Inicializa un array para almacenar los resultados
              while ($row = $result->fetch_assoc()) {
                  $imagenes[] = $row; // Agrega cada fila de resultado al array
              }
          } else {
              $imagenes = array(); // Si no se encontraron registros, el array estará vacío
          }
          
          $conn->close(); // Cierra la conexión
          ?>