<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurante Good Day - Menú del día y especialidades.">
    <meta name="keywords" content="restaurante, menú, especialidades, comida, bebidas, postres">

    <link rel="stylesheet" href="/css/Reset.css">
    <link rel="stylesheet" href="/css/Index.css">
    <title>Good Day</title>
</head>
<body>
    <header>
        <span class="header_logo">GOOD DAY</span>
        <nav class="nav_header" aria-label="Navegación principal">
            <ul class="nav_header__list">
                <li class="nav_header__item active"><a href="#">Principal</a></li>
                <li class="nav_header__item"><a href="#">Carta</a></li>
                <li class="nav_header__item"><a href="#">Nosotros</a></li>
            </ul>
        </nav>
        <div>
            <button aria-label="Usuario">User</button>
            <button aria-label="Ver carrito">Carrito</button>
        </div>
    </header>

    <main>
        <section class="banner">
            <div class="banner__container">
                <h1>Good Day</h1>
            </div>
        </section>

        <section class="menu_del_dia">
            <div class="menu_del_dia__container">
                <h2 class="menu_del_dia__name">MENÚ DEL DÍA</h2>
                <article class="menu-item">
                    <img src="limonada.jpg" alt="Limonada fresca" class="menu_del_dia__img">
                    <span class="bebida">Limonada</span>
                </article>
                <article class="menu-item">
                    <img src="tallarin.jpg" alt="Tallarines Rojos servidos con queso" class="menu_del_dia__img">
                    <span class="menu">Tallarines Rojos</span>
                </article>
                <article class="menu-item">
                    <img src="suspiro.jpg" alt="Postre Suspiro a la Limeña" class="menu_del_dia__img">
                    <span class="postre">Suspiro a la Limeña</span>
                </article>
            </div>
        </section>
    </main>

    <section class="carrusel">
        <div class="carrusel_container">
            <div class="carrusel__slider">
                <div class="carrusel__item">
                    <img src="arroz_con_pato.jpg" alt="Arroz con Pato" class="carrusel__img">
                    <span class="carrusel__desc">Especialidad de la casa</span>
                    <h3 class="carrusel__name">Arroz con Pato</h3>
                </div>
                <div class="carrusel__item">
                    <img src="aji_de_gallina.jpg" alt="Ají de Gallina" class="carrusel__img">
                    <span class="carrusel__desc">Sugerencia del Chef</span>
                    <h3 class="carrusel__name">Ají de Gallina</h3>
                </div>
                <div class="carrusel__item">
                    <img src="lomo_saltado.jpg" alt="Lomo Saltado" class="carrusel__img">
                    <span class="carrusel__desc">Lo más pedido</span>
                    <h3 class="carrusel__name">Lomo Saltado</h3>
                </div>
            </div>
            <div class="carrusel__buttons">
                <button class="carrusel__button_prev" aria-label="Anterior">&#8249;</button>
                <button class="carrusel__button_next" aria-label="Siguiente">&#8250;</button>
            </div>
        </div>
    </section>

    <section class="categoria_menu">
        <div class="container_categorias">
            <div class="categorias__item">
                <span class="categoria__name">Bebidas</span>
                <img src="bebidas.jpg" alt="Bebidas refrescantes" class="categorias__img">
            </div>
            <div class="categorias__item">
                <span class="categoria__name">Platillo</span>
                <img src="platillos.jpg" alt="Variedad de platillos" class="categorias__img">
            </div>
            <div class="categorias__item">
                <span class="categoria__name">Postres</span>
                <img src="postres.jpg" alt="Postres variados" class="categorias__img">
            </div>
        </div>
    </section>

    <footer>
        <nav class="footer__nav">
            <ul class="footer__nav__list">
                <li class="footer__nav__list__item"><a href="#">Ir a la página principal</a></li>
                <li class="footer__nav__list__item"><a href="#">Explorar nuestra carta</a></li>
                <li class="footer__nav__list__item"><a href="#">Conoce más sobre nosotros</a></li>
                <li class="footer__nav__list__item"><a href="#">Inicia sesión en tu cuenta</a></li>
                <li class="footer__nav__list__item"><a href="#">Ver tu carrito de compras</a></li>
            </ul>
        </nav>        
        <div class="social_media">
            <a href="#"><img src="facebook.jpg" alt="facebook" class="redes_logo"></a>
            <a href="#"><img src="instagram.jpg" alt="instagram" class="redes_logo"></a>
            <a href="#"><img src="twitter.jpg" alt="twitter" class="redes_logo"></a>
        </div>
        <p class="footer_desc">Diseño y desarrollo: <a href="#">Good Day</a></p>
        <p class="footer_desc">Todos los derechos reservados &copy; 2024 GOOD DAY</p>
    </footer>
    <script src="main.js"></script>
</body>
</html>
