<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('css/EXIDES.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDA</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="script1.js"></script> 
</head>

<body>

    <header class="header">
        <nav>
            <div class="menu" id="_items">
                <div class="nav_logo"> <img class="logo" src="{{ asset('images/EXIDES.png') }}"></div>
                <div class="nav_items">
                    <a href="/">Inicio</a>
                    <a href="sobrenosotros">Sobre nosotros</a>
                    <a href="login">Iniciar Sesión</a> 
                </div>
            </div>
            <div class="hamburguesa" id="_hamburguesa">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <div class="header-content container">
            <div class="header-img">
                <img src="{{ asset('images/portada.jpg') }}" alt="">
            </div>
            <div class="header-txt">
                <h1>Suelen decir que para viajar lejos, no hay nada mejor que un libro...</h1>
                <p>los mejores libros a tu alcance</p>
            </div>

        </div>
    </header>

    <section class="ofert container">
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="{{ asset('images/romance1.jpg') }}" alt="">
            </div>
            <div class="ofert-txt">
                <h3>ROMANCE</h3>
                <a href="romance" class="btn-2">Informacion</a>
            </div>
        </div>

        <div class="ofert-1">
            <div class="ofert-img">
                <img src="{{ asset('images/fantasia1.jpg') }}" alt="">
            </div>
            <div class="ofert-txt">
                <h3>FANTASÍA</h3>
                <a href="fantasia" class="btn-2">Informacion</a>
            </div>
        </div>

        <div class="ofert-1">
            <div class="ofert-img">
                <img src="{{ asset('images/ficcion1.jpg') }}" alt="">
            </div>
            <div class="ofert-txt">
                <h3>CIENCIA FICCIÓN</h3>
                <a href="ficcion" class="btn-2">Informacion</a>
            </div>
        </div>
    </section>

    <main class="products container" id="lista-1">

        <h2>Productos</h2>

        <div class="product-content">

            <div class="product">
                <img src="{{ asset('images/romance2.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Todas esas cosas que te diré mañana</h3>
                    <p>Romance</p>
                    <p class="precio">9,45€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="1">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/ficcion2.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Divergente</h3>
                    <p>Ciencia Ficción</p>
                    <p class="precio">10,40€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="2">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/fantasia2.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Alas de sangre</h3>
                    <p>Fantasía</p>
                    <p class="precio">21,75€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="3">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/fantasia3.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Asesino de Brujas</h3>
                    <p>Fantasía</p>
                    <p class="precio">15,67€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="4">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/romance3.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Otra vez tú</h3>
                    <p>Romance</p>
                    <p class="precio">9,44€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="5">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/ficcion3.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Una herencia en juego</h3>
                    <p>Ciencia Ficción</p>
                    <p class="precio">17,10€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="6">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/fantasia4.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>De Sangre y Cenizas</h3>
                    <p>Fantasía</p>
                    <p class="precio">18,95</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="6">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/romance4.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Culpa Mía</h3>
                    <p>Romance</p>
                    <p class="precio">10,40€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="6">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/ficcion4.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>La chica del tren</h3>
                    <p>Ciencia Ficción</p>
                    <p class="precio">9,45€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="6">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/fantasia5.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>El señor de los Anillos (La comunidad del Anillo)</h3>
                    <p>Fantasía</p>
                    <p class="precio">10,40€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="6">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('images/romance5.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Todo lo que sé sobre el amor</h3>
                    <p>Romance</p>
                    <p class="precio">9,45€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="6">Agregar al carrito</a>
                </div>
            </div>
        </div>


    </main>

    <section class="icons container">
        <div class="icon-1">
            <div class="icon-img">
                <img src="{{ asset('images/i1.svg') }}" alt="">
            </div>
            <div class="icon-txt">
                <h3>Envíos gratuitos .</h3>
                <p>
                    en pedidos superiores a 30€
                </p>
            </div>
        </div>
        <div class="icon-1">
            <div class="icon-img">
                <img src="{{ asset('images/i2.svg') }}" alt="">
            </div>
            <div class="icon-txt">
                <p>
                    Recibe tu pedido en 24h.
                </p>
            </div>
        </div>
        <div class="icon-1">
            <div class="icon-img">
                <img src="{{ asset('images/i3.svg') }}" alt="">
            </div>
            <div class="icon-txt">
                <h3>Devoluciones gratuitas </h3>
                <p>
                    y garantía de sustitución 24h.
                </p>
            </div>
        </div>
    </section>

    <section class="testimonial container">
        <span>Opiniones</span>
        <h2>Que opinan nuestros clientes</h2>
        <div class="testimonial-content">
            <div class="testimonial-1">
                <p>
                    Compre un ordenador configurado a mi gusto, lo compre el día 1 de octubre lo
                    recibí hasta el día 4 de ese mes. En ese tiempo la comunicación fue fluida y 
                    en todo momento amable.
                    
                </p>
                <img src="{{ asset('images/starts.png') }}" alt="">
                <h4>Alvaro</h4>
            </div>
            <div class="testimonial-1">
                <p>
                    Profesionales serios. Envío rápido y sin problemas. Precios sin competencia. Muy recomendable.
                </p>
                <img src="{{ asset('images/starts.png') }}" alt="">
                <h4>Pablo</h4>
            </div>
        </div>
    </section>

    <footer>
        <div class="contenedor-footer">
            <div class="contenido-footer">
                <h4>Phone</h4>
                <p>+34 944 88 66 22</p>
            </div>
            <div class="contenido-footer">
                <h4>Email</h4>
                <p>contacto@exides.com</p>
            </div>
            <div class="contenido-footer">
                <h4>Ubicación</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d726.0186994556553!2d-2.994772491448044!3d43.29175526049773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e5a75bda62159%3A0x1002c9fcee8038fb!2sVideoclub%20Iris!5e0!3m2!1ses!2ses!4v1700077650993!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    
        </div>
        <h2 class="texto-final">&copy; EXIDES | Laura Jaimes</h2>
    </footer>

    <script>
        _hamburguesa.onclick=()=>{
            _items.classList.toggle("open");
            _hamburguesa.classList.toggle("close");
        }</script>
    
</body>

