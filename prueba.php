<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Lightbox Modal</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f1f1f1;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.image {
    position: relative;
    margin: 10px;
    cursor: pointer;
}

.image img {
    
    max-width: 100%;
    height: auto;
    border: 2px solid #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image:hover .overlay {
    opacity: 1;
}

.modal {
    background-color: #fff;
    
   
padding: 20px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
    position: relative;
    text-align: center;
}

.close-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
    color: #000;
}
    </style>
</head>
<body>
    <div class="gallery">
        <div class="image">
            <img src="imagenes/image5.jpg" alt="Imagen 1">
            <div class="overlay">
                <div class="modal">
                    <img src="imagenes/image1.jpg" alt="Imagen 1">
                    <label for="modal-1" class="close-modal">&#10006;</label>
                </div>
            </div>
        </div>
        <div class="image">
            <img src="imagenes/image3.jpg" alt="Imagen 2">
            <div class="overlay">
                <div class="modal">
                    <img src="imagenes/image2.jpg" alt="Imagen 2">
                    <label for="modal-2" class="close-modal">&#10006;</label>
                </div>
            </div>
        </div>
        <!-- Agrega más imágenes aquí -->
    </div>
</body>
</html>

