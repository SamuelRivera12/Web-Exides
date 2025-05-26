<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="images/Exides-Logo.png">
    <link rel="stylesheet" href="{{ asset('css/tienda_styles.css') }}">
    <title>Tienda</title>
</head>

<body>
    <header>
        <nav>
            <div class="nav_logo">
                <a href="/">
                    <img class="logo" src="{{ asset('images/Exides-Logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="nav_items" id="navItems">
                <a href="/">Inicio</a>
                <a href="sobrenosotros">Sobre Nosotros</a>
                <a href="login">Iniciar Sesión</a>
            </div>
            <div class="hamburguesa" id="hamburguesa">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Icono del carrito movido aquí -->
            <div class="cart-container">
                <button id="cart-btn" style="background:none;border:none;cursor:pointer;position:relative;">
                    <i class="fas fa-shopping-cart" style="font-size:1.7rem;color:#FFDA63;"></i>
                    <span id="cart-count" style="position:absolute;top:-8px;right:-10px;background:#FFDA63;color:#181818;font-weight:bold;border-radius:50%;padding:2px 7px;font-size:0.9rem;">0</span>
                </button>
            </div>
        </nav>
        <section class="textoheader">
            <h1>Tienda</h1>
            <h4>Lo Mejor de lo Mejor</h4>
        </section>
    </header>

    <div class="contenedor" style="padding-top:40px; padding-bottom:40px;">
        <!-- Filtros -->
        <form id="filtros-form" class="filtros-menu">
            <input type="text" id="filtro-titulo" placeholder="Buscar por título..." />
            <input type="number" id="filtro-precio-min" placeholder="Precio mínimo" min="0" step="0.01" />
            <input type="number" id="filtro-precio-max" placeholder="Precio máximo" min="0" step="0.01" />
            <select id="filtro-categoria">
                <option value="">Todas las categorías</option>
                <option value="Ratones">Ratones</option>
                <option value="Teclados">Teclados</option>
                <option value="Cascos">Cascos</option>
                <option value="Altavoces">Altavoces</option>
                <option value="Monitores">Monitores</option>
            </select>
            <button type="submit">Aplicar filtros</button>
        </form>

        <div class="galeria" id="galeria-productos">
            <?php
                $json = file_get_contents(public_path('assets/products.json'));
                $products = json_decode($json, true);
                foreach ($products as $product):
            ?>
            <a href="{{ url('/producto/' . $product['id']) }}" class="product-card"
                data-titulo="{{ strtolower($product['nombre'] ?? '') }}"
                data-precio="{{ $product['precio'] ?? 0 }}"
                data-categoria="{{ $product['categoria'] ?? '' }}">
                <img class="product-image" src="{{ asset($product['foto']) }}" alt="{{ $product['nombre'] }}">
                <h3 class="product-title">{{ $product['nombre'] ?? '' }}</h3>
                <div class="product-bottom">
                    <strong class="product-price">
                        {{ isset($product['precio']) ? number_format($product['precio'], 2) . ' €' : '' }}
                    </strong>
                    <button class="product-button" onclick="event.preventDefault(); addToCart('{{ $product['nombre'] }}', {{ $product['precio'] }}, '{{ $product['foto'] }}')">
                        Agregar al carrito
                    </button>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Panel lateral del carrito -->
    <div id="cart-panel" class="cart-panel">
        <div class="cart-panel-content">
            <button id="close-cart" class="close-cart-btn">&times;</button>
            <h2>Carrito</h2>
            <hr class="cart-modal-hr">
            <div id="cart-items"></div>
            <div id="cart-total"></div>
            <button id="pagar-btn">Pagar</button>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Sobre Exides</h3>
                <p>Tu tienda de confianza en periféricos y equipamiento profesional desde 2005.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Enlaces Útiles</h3>
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Ayuda</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Devoluciones</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-phone"></i> +34 944 88 66 22</li>
                    <li><i class="fas fa-envelope"></i> contacto@exides.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Bilbao, España</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="footer-legal">
                    <a href="#">Política de Privacidad</a>
                    <a href="#">Términos y Condiciones</a>
                    <a href="#">Política de Cookies</a>
                    <a href="#">Aviso Legal</a>
                </div>
                <p class="footer-copyright">
                    &copy; 2023 Exides. Todos los derechos reservados
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('hamburguesa').addEventListener('click', function() {
            this.classList.toggle('open');
            document.getElementById('navItems').classList.toggle('open');
        });

        document.getElementById('filtros-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const titulo = document.getElementById('filtro-titulo').value.trim().toLowerCase();
            const precioMin = parseFloat(document.getElementById('filtro-precio-min').value) || 0;
            const precioMax = parseFloat(document.getElementById('filtro-precio-max').value) || Infinity;
            const categoria = document.getElementById('filtro-categoria').value;

            document.querySelectorAll('.product-card').forEach(card => {
                const cardTitulo = card.getAttribute('data-titulo');
                const cardPrecio = parseFloat(card.getAttribute('data-precio')) || 0;
                const cardCategoria = card.getAttribute('data-categoria');

                let visible = true;
                if (titulo && !cardTitulo.includes(titulo)) visible = false;
                if (cardPrecio < precioMin || cardPrecio > precioMax) visible = false;
                if (categoria && cardCategoria !== categoria) visible = false;

                card.style.display = visible ? '' : 'none';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Get category from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const categoria = urlParams.get('categoria');

            // If there's a category parameter, set it in the filter and trigger the filter
            if (categoria) {
                const filtroCategoria = document.getElementById('filtro-categoria');
                filtroCategoria.value = categoria;

                // Trigger the filter
                const filterEvent = new Event('submit');
                document.getElementById('filtros-form').dispatchEvent(filterEvent);
            }

            // Attach add to cart listeners
            attachAddToCartListeners();
        });
    </script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/tienda.js') }}"></script>
</body>

</html>