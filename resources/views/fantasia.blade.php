<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('images/EXIDES.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDA</title>
    <link rel="stylesheet" href="{{ asset('css/fantasia.css') }}">
    <script src="script1.js"></script> 
</head>

<body>

    <header class="header">
        <div class="menu container">
            <img class="logo" src="{{ asset('css/fantasia.jpg') }}">
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="menu.png" class="menu-icono" alt="">
            </label>
            <nav>
                <div class="menu" id="_items">
                    <div class="nav_items">
                    <a href="/">Inicio</a>
                    <a href="sobrenosotros">Sobre nosotros</a>
                    <a href="index_catalogo">Tienda</a>        
                    <a href="login">Iniciar Sesión</a> 
                    </div>
                </div>
                <div class="hamburguesa" id="_hamburguesa">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>

        <div class="header-content container">
            <div class="header-img">
                <img src="fantasia.jpg" alt="">
            </div>
            <div class="header-txt">
                <h1>FANTASÍA</h1>
                <a href="index" class="btn-1">Volver al Incio</a>
            </div>

        </div>
    </header>

    <section class="ofert container">
        <div class="ofert-1">
            <div class="ofert-img">
                <img src="{{ asset('css/ficcion1.jpg') }}" alt="">
            </div>
            <div class="ofert-txt">
                <h3>CIENCIA FICCIÓN</h3>
                <a href="ficcion" class="btn-2">Informacion</a>
            </div>
        </div>
        </div>

        <div class="ofert-1">
            <div class="ofert-img">
                <img src="{{ asset('css/romance1.jpg') }}" alt="">
            </div>
            <div class="ofert-txt">
                <h3>ROMANCE</h3>
                <a href="romance" class="btn-2">Informacion</a>
            </div>
        </div>

    </section>

    <main class="products container" id="lista-1">

        <h2>Productos</h2>

        <div class="product-content">

            <div class="product">
                <img src="{{ asset('css/fantasia1.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Harry Potter y La Piedra Filosofal</h3>
                    <p class="precio">34,16€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="1">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('css/fantasia2.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Alas de sangre</h3>
                    <p class="precio">21,75€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="2">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('css/fantasia3.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>Asesino de brujas</h3>
                    <p class="precio">15,67€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="3">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('css/fantasia4.jpg') }}" alt="">
                <div class="product-txt">
                    <h3>De sangre y cenizas</h3>
                    <p class="precio">18,95€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="4">Agregar al carrito</a>
                </div>
            </div>
            <div class="product">
                <img src="{{ asset('css/fantasia5.jpg') }}"alt="">
                <div class="product-txt">
                    <h3>El señor de los anillos (la comunidad del anillo)</h3>
                    <p class="precio">10,40€</p>
                    <a href="#" class="agregar-carrito btn-2" data-id="5">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </main>
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
</html>