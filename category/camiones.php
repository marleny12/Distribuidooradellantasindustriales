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
          
          // Ejecutar consulta para obtener los productos
          $sql = "SELECT products.*
          FROM products
          WHERE products.category_id = 3";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              // Inicializar un array para almacenar los productos
              $products = [];
          
              while ($row = $result->fetch_assoc()) {
                  $product = [
                      'name' => $row['name'],
                      'price' => '$' . $row['price'],
                      'description' => $row['description'],
                      'images' => explode(';', $row['image_path'])
                  ];
          
                  $products[] = $product;
              }
          } else {
              echo "No se encontraron productos.";
          }
          
          // Cierra la conexión a la base de datos
          $conn->close();
          ?>