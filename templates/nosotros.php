<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Good Day - Nosotros</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/nosotros.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header id="header">
        <div id="menu-container"></div>
        <!-- Img Header -->
        <figure class="img-header">
            <div class="welcome">

                <h4>"Por un buen día de sabores sin barreras"</h4>
                <h2><a href="#">
                        <i class="fas fa-utensils"></i>
                        Good Day
                    </a></h2>
            </div>
        </figure>

    </header>

    <main>

        <!-- About Us -->
        <section class="about-us">
            <div class="info">
                <h3>Acerca de nosotros</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptatem possimus, cum nostrum
                    quibusdam, tempore odit recusandae delectus eos debitis ducimus quisquam similique porro animi ut
                    quos, eum fuga perferendis. Quibusdam, dignissimos repudiandae possimus amet deserunt doloribus eius
                    vero consectetur exercitationem impedit? Obcaecati asperiores repellat deserunt ullam necessitatibus
                    repudiandae ut.</p>
                <hr>
            </div>

            <div class="free-content">
                <div class="icons">
                    <div>
                        <div class="span-icon"><span><i class="fas fa-users"></i></span></div>
                        <h6>Valores</h6>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis nesciunt sed mollitia ea ut
                            itaque.</p>
                    </div>

                    <div>
                        <div class="span-icon"><span><i class="fas fa-bullseye"></i></span></div>
                        <h6>Misión</h6>
                        <p>Proporcionar una experiencia culinaria única y accesible para todos,
                            donde la diversidad se celebre a través de platos de distintas culturas y donde
                            persona se sienta bienvenida.
                        </p>
                    </div>

                    <div>
                        <div class="span-icon"><span><i class="fas fa-chart-line"></i></span></div>
                        <h6>Visión</h6>
                        <p>Ser reconocidos como el restaurante inclusivo, donde cada detalle de nuestra experiencia
                            esté pensado para que todas las personas, sin excepción, puedan disfrutar de la mejor comida
                            y calidad
                            de servicio</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- Gallery -->
        <section class="gallery-section">
            <div class="animal-icon">
                <i class="fas fa-utensils"></i>
            </div>

            <div class="gallery-content">
                <div class="img-card"><img src="../static/images/img-nosotros/img-1.avif" alt="Buffet"></div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-2.jpg" alt="Cocina"></div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-3.jpg" alt="Cumpleaños"></div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-4.jpeg" alt="Comensales"></div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-5.jpeg" alt="En Pandemia"></div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-6.jpg" alt="Barra"></div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-7.jpg" alt="Ingredientes de Calidad">
                </div>
                <div class="img-card"><img src="../static/images/img-nosotros/img-8.jpg" alt="Anton Ego"></div>

            </div>

            <!-- Modal -->
            <div class="modal">
                <span id="closeModal"><i class="fas fa-times"></i></span>
                <img id="imgModal">
                <p id="caption"></p>
            </div>

        </section>

        <!--Footer-->
        <div id="footer-container"></div>
    </main>

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
        function cargarFooter() {
            fetch('./components/footer.html')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se pudo cargar el footer');
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('footer-container').innerHTML = html;
                    // Inicializar el carrusel de Bootstrap después de cargar el contenido
                    new bootstrap.Carousel(document.querySelector('.footer'));
                })
                .catch(error => {
                    console.error('Error al cargar el footer:', error);
                    document.getElementById('footer-container').innerHTML = '<p>Error al cargar el footer</p>';
                });
        }

        // Llamar a la función cuando se carga la página
        window.addEventListener('load', cargarFooter);
    </script>

    </script>
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/35db202371.js" crossorigin="anonymous"></script>
    <script src="../static/js/app.js"></script>

</body>

</html>