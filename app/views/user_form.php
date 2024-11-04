<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de Menú</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Enlace a CSS -->
    <link rel="stylesheet" href="../../static/css/carta.css">
    <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">

</head>
<body>
    <header class="header">
        <div id="menu-container"></div>
    </header>

    <article class="article">
        <div id="carrusel-container"></div>
    </article>
    

    <main class="main">
        <div class="categorias">
            <div class="bebidas">
                <img src="../static/images/bebidas.jpg" alt="">
                <div class="categoria-info">
                    <h3>Bebidas</h3>
                    <!--p>Descripción de la categoría</p-->
                </div>
            </div>      
            <div class="postres">
                <img src="../static/images/postres.jpg" alt="">
                <div class="categoria-info">
                    <h3>Postres</h3>
                    <!--p>Descripción de la categoría</p-->
                </div>
            </div>
            <div class="platillos">
                <img src="../static/images/platillos.jpg" alt="">
                <div class="categoria-info">
                    <h3>Platillos</h3>
                    <!--p>Descripción de la categoría</p-->
                </div>
            </div>
        </div>
    </main>
    
    <section class="section carta-section">
        <div class="carta carta-container">
            <h3 class="carta-title">Carta de Menú</h3>
            <div class="carta-content" id="carta-container">
                <?php
                // Conectar a la base de datos
                require_once '../../app/dao/ProductosDAO.php';

                $productosDAO = new ProductosDAO();
                $productos = $productosDAO->all();

                // Asegúrate de que $productos sea un arreglo y no un objeto
                if (is_array($productos)) {
                    foreach ($productos as $producto) {
                        // Aquí accedemos a los elementos del arreglo, no a métodos de un objeto
                        echo '<div class="producto carta-item">';
                        echo '<div class="producto-image-container">';
                        echo '<img src="../../static/images/img-producto/' . htmlspecialchars($producto['foto_prod']) . '.jpg" alt="Imagen de ' . htmlspecialchars($producto['nombre_prod']) . '" class="producto-image">';
                        echo '</div>';
                        echo '<div class="producto-info">';
                        echo '<h4 class="producto-title">' . htmlspecialchars($producto['nombre_prod']) . '</h4>';
                        echo '<p class="producto-description">' . htmlspecialchars($producto['descripcion']) . '</p>';
                        echo '<p class="producto-price">Precio: ' . htmlspecialchars($producto['precio']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-products-found">No se encontraron productos.</p>';
                }
                ?>
            </div>
            <p id="error-message" class="error-message"></p>
        </div>
    </section>
    
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4 id="modal-nombre"></h4>
            <h5 id="modal-categoria"></h5>
            <img id="modal-imagen" src="" alt="" class="imagen-platillo">
            <p id="modal-descripcion"></p>
            <span class="precio" id="modal-precio"></span>

            <div class="cantidad-container mt-3">
                <button id="btn-decrementar" class="btn btn-secondary">-</button>
                <span id="cantidad" class="mx-2">1</span>
                <button id="btn-incrementar" class="btn btn-secondary">+</button>
            </div>
            <button id="btn-agregar" class="btn btn-success mt-3">Agregar al carrito</button>
            <button id="btn-comprar" class="btn btn-primary mt-3">Comprar</button>
        </div>
    </div>

    <!-- Agregar el script de Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para cargar el menú
        function cargarMenu() {
            fetch('./components/menu.html')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se pudo cargar el menú');
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('menu-container').innerHTML = html;
                    // Inicializar el carrusel de Bootstrap después de cargar el contenido   
                })
                .catch(error => {
                    console.error('Error al cargar el menú:', error);
                    document.getElementById('menu-container').innerHTML = '<p>Error al cargar el menú</p>';
                });
        }

        // Llamar a la función cuando se carga la página
        window.addEventListener('load', cargarMenu);

        // Función para cargar el carrusel
        function cargarCarrusel() {
            fetch('./components/carrusel.html')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se pudo cargar el carrusel');
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('carrusel-container').innerHTML = html;
                    // Inicializar el carrusel de Bootstrap después de cargar el contenido
                    new bootstrap.Carousel(document.querySelector('.carousel'));
                })
                .catch(error => {
                    console.error('Error al cargar el carrusel:', error);
                    document.getElementById('carrusel-container').innerHTML = '<p>Error al cargar el carrusel</p>';
                });
        }

        // Llamar a la función cuando se carga la página
        window.addEventListener('load', cargarCarrusel);
    </script>

   
</body>
</html>
