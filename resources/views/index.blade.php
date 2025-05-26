<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/Exides-Logo.png">
    <link rel="stylesheet" href="{{ asset('css/index_styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Exides</title>
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
            <a href="{{ url('sobrenosotros') }}">Sobre Nosotros</a>
            <a href="{{ url('tienda') }}">Tienda</a>

            @guest
                <a href="{{ route('login') }}">Iniciar Sesión</a>
            @else
                @if (Auth::user()->role === 'admin')
                    <a href="{{ url('panel') }}">Panel</a>
                @endif
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                </a>
            @endguest
        </div>
        <div class="hamburguesa" id="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <section class="textoheader">
        <h1>EXIDES</h1>
        <h4>El Mejor Equipamiento al Mejor Precio</h4>
    </section>

    <!-- Formulario de logout oculto -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>


    <section class="novedades">
        <div class="contenedor">
            <h2 class="titulo">Novedades!!!</h2>
            <div class="galeria">
                <div class="producto-wrapper">
                    <a href="/producto/1">
                        <div class="nofotos">
                            <img src="{{ asset('images/Logitech_G_Pro_X_Superlight.jpg') }}" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">Logitech G Pro X Superlight</p>
                    </a>
                </div>
                <div class="producto-wrapper">
                    <a href="/producto/6">
                        <div class="nofotos">
                            <img src="{{ asset('images/Razer_BlackWidow_V3.jpg') }}" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">Razer BlackWidow V3</p>
                    </a>
                </div>
                <div class="producto-wrapper">
                    <a href="/producto/12">
                        <div class="nofotos">
                            <img src="images/LG_27GL850-B.jpg" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">LG 27GL850-B</p>
                    </a>
                </div>
                <div class="producto-wrapper">
                    <a href="/producto/17">
                        <div class="nofotos">
                            <img src="images/steelseries_arctis_7.jpg" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">SteelSeries Arctis 7</p>
                    </a>
                </div>
                <div class="producto-wrapper hidden-mobile">
                    <a href="/producto/2">
                        <div class="nofotos">
                            <img src="images//Razer_DeathAdder_V2.jpg" height="250" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">Razer DeathAdder V2</p>
                    </a>
                </div>
                <div class="producto-wrapper hidden-mobile">
                    <a href="/producto/8">
                        <div class="nofotos">
                            <img src="images/Logitech_G915_Lightspeed.jpg" height="250" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">Logitech G915 Lightspeed</p>
                    </a>
                </div>
                <div class="producto-wrapper hidden-mobile">
                    <a href="/producto/11">
                        <div class="nofotos">
                            <img src="images/asus_rog_swift_pg279q.jpg" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">ASUS ROG Swift PG279Q</p>
                    </a>
                </div>
                <div class="producto-wrapper hidden-mobile">
                    <a href="/producto/16">
                        <div class="nofotos">
                            <img src="images/hyperx_cloud_ii.jpg" alt="Periférico">
                            <div class="nohover">
                                <p>Ver en Tienda</p>
                            </div>
                        </div>
                        <p class="producto-descripcion">HyperX Cloud II</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="clientes">
        <div class="contenedor">
            <h2 class="titulo">Opiniones de Clientes</h2>
            <div class="tarjetas">
                <div class="tarjeta">
                    <img src="{{ asset('images/Foto-Perfil-1.jpg') }}" alt="Foto del Cliente">
                    <h4>Amador Rivas</h4>
                    <p>"Excelentes productos y un servicio increíble. ¡Recomiendo esta tienda!"</p>
                    <div class="estrellas">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                    </div>
                </div>
                <div class="tarjeta">
                    <img src="{{ asset('images/Foto-Perfil-2.jpg') }}" alt="Foto del Cliente">
                    <h4>Vicente Maroto</h4>
                    <p>"El mejor lugar para encontrar periféricos de alta calidad. ¡Envío rápido y excelente soporte!"</p>
                    <div class="estrellas">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/empty_star.png') }}" alt="Estrella">
                    </div>
                </div>
                <div class="tarjeta">
                    <img src="{{ asset('images/Foto-Perfil-3.jpg') }}" alt="Foto del Cliente">
                    <h4>Estela Reynolds</h4>
                    <p>"Muy contenta con mi compra. Los productos son tal como se describen y el envío fue rápido."</p>
                    <div class="estrellas">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                        <img src="{{ asset('images/star.png') }}" alt="Estrella">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-services">
        <div class="contenedor">
            <h2 class="titulo">Buscas algo? Te ayudamos!</h2>
            <div class="servicio-cont">
                <div class="grid-botones">
                    <a href="tienda?categoria=Ratones" class="boton-categoria ratones-button"></a>
                    <a href="tienda?categoria=Teclados" class="boton-categoria teclados-button"></a>
                    <a href="tienda?categoria=Cascos" class="boton-categoria cascos-button"></a>
                    <a href="tienda?categoria=Altavoces" class="boton-categoria altavoces-button"></a>
                </div>
            </div>
        </div>
    </section>

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
    </script>
</body>
</html>
