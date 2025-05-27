<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/Exides-Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/producto_styles.css') }}">
    <title>{{ $producto['nombre'] }}</title>
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
                <a href="/sobrenosotros">Sobre Nosotros</a>
                <a href="/tienda">Tienda</a>
                @guest
                    <a href="/login">Iniciar Sesión</a>
                @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
            <!-- Reemplazar el div cart-container existente con esto -->
            @auth
            <div class="cart-container">
                <button id="cart-btn" style="background:none;border:none;cursor:pointer;position:relative;margin-right:35px;">
                    <i class="fas fa-shopping-cart" style="font-size:1.7rem;color:#FFDA63;"></i>
                    <span id="cart-count" style="position:absolute;top:-8px;right:-5px;background:#FFDA63;color:#181818;font-weight:bold;border-radius:50%;padding:2px 7px;font-size:0.9rem;">0</span>
                </button>
            </div>
            @endauth
            <div class="hamburguesa" id="hamburguesa">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <section class="textoheader">
            <h1>{{ $producto['nombre'] }}</h1>
        </section> 
    </header>

    <div class="contenedor">
        <div class="producto-grid">
            <!-- Galería de imágenes -->
            <div class="galeria-producto">
                <div class="imagen-principal">
                    <img src="{{ $producto['foto'] ?? asset('images/no-image.png') }}" 
                         alt="{{ $producto['nombre'] ?? 'Imagen no disponible' }}" 
                         id="imagenPrincipal">
                </div>
            </div>

            <!-- Información del producto -->
            <div class="info-producto">
                <h3 class="marca">{{ $producto['marca'] ?? 'Marca no disponible' }}</h3>
                <div class="precio">{{ number_format($producto['precio'] ?? 0, 2) }} €</div>
                
                @if(($producto['unidades'] ?? 0) > 0)
                    <div class="stock disponible">
                        <i class="fas fa-check"></i> En stock ({{ $producto['unidades'] }} disponibles)
                    </div>
                @else
                    <div class="stock agotado">
                        <i class="fas fa-times"></i> Agotado
                    </div>
                @endif

                <div class="acciones">
                    @auth
                        <button class="btn-carrito" onclick="addToCart('{{ $producto['nombre'] }}', {{ $producto['precio'] }}, '{{ $producto['foto'] }}')">
                            <i class="fas fa-shopping-cart"></i> Añadir al carrito
                        </button>
                    @else
                        <button class="btn-carrito" onclick="showLoginAlert(); redirectToLogin();">
                            <i class="fas fa-shopping-cart"></i> Iniciar sesión para comprar
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Características y descripción -->
            <div class="detalles-producto">
                <div class="tabs">
                    <button class="tab-btn active" onclick="cambiarTab('descripcion')">Descripción</button>
                    <button class="tab-btn" onclick="cambiarTab('caracteristicas')">Características</button>
                </div>

                <div id="descripcion" class="tab-content active">
                    {!! nl2br(e($producto['descripcion'] ?? 'Descripción no disponible')) !!}
                </div>

                <div id="caracteristicas" class="tab-content">
                    <table class="tabla-caracteristicas">
                        <tr>
                            <th>Categoría</th>
                            <td>{{ $producto['categoria'] ?? 'No especificada' }}</td>
                        </tr>
                        <tr>
                            <th>Marca</th>
                            <td>{{ $producto['marca'] ?? 'No especificada' }}</td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td>{{ $producto['tipo'] ?? 'No especificado' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Reemplazar el panel lateral del carrito existente con esto -->
    @auth
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
    @endauth

    @guest
    <div id="login-alert-modal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Iniciar Sesión Requerido</h2>
            <p>Para agregar productos al carrito y realizar compras, necesitas iniciar sesión.</p>
            <div class="modal-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
            </div>
        </div>
    </div>
    @endguest

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
        function cambiarImagen(src) {
            document.getElementById('imagenPrincipal').src = src;
            document.querySelectorAll('.miniatura').forEach(min => {
                min.classList.remove('active');
                if(min.src === src) min.classList.add('active');
            });
        }

        function cambiarTab(tab) {
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById(tab).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        // Hamburger menu functionality
        document.getElementById('hamburguesa').addEventListener('click', function() {
            this.classList.toggle('open');
            document.getElementById('navItems').classList.toggle('open');
        });

        function redirectToLogin() {
            window.location.href = "{{ route('login') }}";
        }

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Event listeners para el carrito
        //     const cartBtn = document.getElementById('cart-btn');
        //     const closeCartBtn = document.getElementById('close-cart');
        //     const cartPanel = document.getElementById('cart-panel');

        //     cartBtn.addEventListener('click', function() {
        //         cartPanel.classList.add('open');
        //         updateCartModal();
        //     });

        //     closeCartBtn.addEventListener('click', function() {
        //         cartPanel.classList.remove('open');
        //     });
        // });
    </script>
    <script src="{{ asset('js/cart.js') }}"></script>
</body>
</html>