<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrusel de Imágenes</title>
    <!-- Enlace a Bootstrap CSS -->
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"-->    
    <!-- Enlace a CSS -->
    <link rel="stylesheet" href="../css/carta.css">
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
    
    <section class="section">
        <div class="carta">
            <h3>Carta</h3>
            <div class="carta-container" id="carta-container">
                <!-- Las tarjetas se generarán dinámicamente aquí -->
            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simulación de datos de platillos (en una aplicación real, estos datos vendrían de una API o base de datos)
            const productos = [
                { categoria: 'platillos', nombre: 'Enchiladas', descripcion: 'Deliciosas enchiladas con salsa verde', precio: '$120', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Tacos al Pastor', descripcion: 'Tacos de carne al pastor con piña', precio: '$80', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Quesadillas', descripcion: 'Quesadillas de queso oaxaca', precio: '$60', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Mole Poblano', descripcion: 'Tradicional mole poblano con pollo', precio: '$150', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Chiles en Nogada', descripcion: 'Chiles rellenos con frutos secos y granada', precio: '$180', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Pozole', descripcion: 'Sopa tradicional de maíz con carne', precio: '$100', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Tamales', descripcion: 'Tamales de pollo en hoja de maíz', precio: '$40', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Cochinita Pibil', descripcion: 'Carne de cerdo adobada estilo Yucatán', precio: '$130', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'platillos', nombre: 'Guacamole', descripcion: 'Fresco guacamole con totopos', precio: '$70', imagen: '../static/imgprod/platos.jpg' },
                { categoria: 'bebidas', nombre: 'Café', descripcion: 'Café recién hecho', precio: '$50', imagen: '../static/imgprod/bebidas.jpg' },
                { categoria: 'bebidas', nombre: 'Té', descripcion: 'Té caliente o frío', precio: '$40', imagen: '../static/imgprod/bebidas.jpg' },
                { categoria: 'bebidas', nombre: 'Refresco', descripcion: 'Refresco de cola o limón', precio: '$30', imagen: '../static/imgprod/bebidas.jpg' },
                { categoria: 'bebidas', nombre: 'Jugo', descripcion: 'Jugo natural de naranja o toronja', precio: '$35', imagen: '../static/imgprod/bebidas.jpg' },
                { categoria: 'postres', nombre: 'Pastel de Chocolate', descripcion: 'Delicioso pastel de chocolate', precio: '$90', imagen: '../static/imgprod/postres.jpg' },
                { categoria: 'postres', nombre: 'Helado', descripcion: 'Helado de vainilla o chocolate', precio: '$60', imagen: '/static/imgprod/postres.jpg' },
                { categoria: 'postres', nombre: 'Flan', descripcion: 'Flan de caramelo', precio: '$50', imagen: '../static/imgprod/postres.jpg' },
                { categoria: 'postres', nombre: 'Gelatina', descripcion: 'Gelatina de frutas', precio: '$40', imagen: '../static/imgprod/postres.jpg' }
            ];

            const cartaContainer = document.getElementById('carta-container');
            const modal = document.getElementById('modal');
            const closeModal = document.querySelector('.close');
            let cantidad = 1; // Cantidad inicial

            // Agrupar productos por categoría
            const productosPorCategoria = {};
            productos.forEach(producto => {
                if (!productosPorCategoria[producto.categoria]) {
                    productosPorCategoria[producto.categoria] = [];
                }
                productosPorCategoria[producto.categoria].push(producto);
            });

            // Crear las tarjetas por categoría
            for (const categoria in productosPorCategoria) {
                const h2 = document.createElement('h2');
                h2.textContent = categoria;
                cartaContainer.appendChild(h2);
                cartaContainer.appendChild(document.createElement('hr'));

                productosPorCategoria[categoria].forEach(producto => {
                    const tarjeta = document.createElement('button');
                    tarjeta.className = 'tarjeta-platillo';
                    tarjeta.innerHTML = `
                        <img src="${producto.imagen}" alt="${producto.nombre}" class="imagen-platillo">
                        <h4>${producto.nombre}</h4>
                        <p>${producto.descripcion}</p>
                        <span class="precio">${producto.precio}</span>
                    `;

                    tarjeta.addEventListener('click', () => {
                        document.getElementById('modal-nombre').textContent = producto.nombre;
                        document.getElementById('modal-categoria').textContent = producto.categoria; // Muestra la categoría
                        document.getElementById('modal-imagen').src = producto.imagen;
                        document.getElementById('modal-descripcion').textContent = producto.descripcion;
                        document.getElementById('modal-precio').textContent = producto.precio;

                        // Reiniciar cantidad al abrir el modal
                        cantidad = 1;
                        document.getElementById('cantidad').textContent = cantidad;
                        modal.style.display = 'block';
                    });

                    cartaContainer.appendChild(tarjeta);
                });
            }

            // Botones de cantidad
            document.getElementById('btn-incrementar').addEventListener('click', () => {
                cantidad++;
                document.getElementById('cantidad').textContent = cantidad;
            });

            document.getElementById('btn-decrementar').addEventListener('click', () => {
                if (cantidad > 1) {
                    cantidad--;
                    document.getElementById('cantidad').textContent = cantidad;
                }
            });

            // Cerrar el modal
            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>