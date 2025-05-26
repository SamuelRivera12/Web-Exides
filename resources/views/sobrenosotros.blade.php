<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="images/Exides-Logo.png">
    <link rel="stylesheet" href="{{ asset('css/sobrenosotros_styles.css') }}">
    <title>Sobre Nosotros</title>
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
                <a href="tienda">Tienda</a>
                <a href="login">Iniciar Sesión</a>
            </div>
            <div class="hamburguesa" id="hamburguesa">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <section class="textoheader">
            <h1>Sobre Nosotros</h1>
        </section>
    </header>

    <section class="about-section">
        <div class="contenedor">
            <h2 class="titulo">¿Cómo nace Exides?</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>En 2005 cinco personas nos juntamos en un grado superior de Desarrollo de Aplicaciones Multiplataforma. Después de realizar varios retos y de aprender conjuntamente día tras día, compartiendo conocimientos y experiencias, decidimos poner en marcha un proyecto que iniciamos en clase como una simulación. Lo que comenzó como un simple trabajo académico pronto se convirtió en una visión compartida de lo que podría llegar a ser una empresa real dedicada a la tecnología.</p>

                    <p>Con ello empezamos a formar la empresa y a formar un equipo con más gente. Comenzamos en un pequeño local en Bilbao, con recursos limitados pero con una gran ilusión. Poco a poco, fuimos expandiendo nuestro catálogo de productos y servicios, siempre manteniéndonos al día con las últimas tendencias en tecnología y periféricos. La confianza de nuestros primeros clientes fue fundamental para nuestro crecimiento inicial.</p>

                    <p>Y así nació nuestra empresa, con la entrega de las cinco personas y que cada día es más grande y la forma más gente inspiradora y trabajadora. Hoy, después de años de dedicación y esfuerzo continuo, nos hemos convertido en un referente en el sector de periféricos en el País Vasco. Nuestro equipo ha crecido hasta incluir especialistas en hardware, expertos en atención al cliente y profesionales apasionados por la tecnología. Mantenemos vivo el espíritu de innovación y colaboración que nos unió en aquellas primeras clases del grado superior, y seguimos aprendiendo y evolucionando cada día para ofrecer el mejor servicio posible a nuestra comunidad de usuarios.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="valores-section">
        <div class="contenedor">
            <h2 class="titulo">Nuestros Valores</h2>
            <div class="valores-grid">
                <div class="valor-card">
                    <img src="{{ asset('images/Valores-Proposito.png') }}" alt="Propósito">
                    <h3>Propósito</h3>
                    <p>Mejorar la experiencia tecnológica de nuestros clientes ofreciéndoles periféricos de calidad que se adapten a sus necesidades, ya sea para el trabajo, el estudio o el entretenimiento.</p>
                </div>
                <div class="valor-card">
                    <img src="{{ asset('images/Valores-Mision.png') }}" alt="Misión">
                    <h3>Misión</h3>
                    <p>Brindar una amplia gama de periféricos de las mejores marcas, con asesoramiento personalizado y un servicio postventa cercano, para que cada usuario encuentre el producto ideal para su día a día.</p>
                </div>
                <div class="valor-card">
                    <img src="{{ asset('images/Valores-Vision.png') }}" alt="Visión">
                    <h3>Visión</h3>
                    <p>Ser la tienda de referencia en la venta de periféricos a nivel nacional, reconocidos por la calidad de nuestros productos, la atención al cliente y nuestro compromiso con la innovación tecnológica.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="estrategia-section">
        <div class="contenedor">
            <h2 class="titulo">Nuestra Estrategia</h2>
            <div class="estrategia-content">
                <div class="estrategia-text">
                    <p>La comunicación directa y personalizada con nuestros clientes ha sido siempre nuestra prioridad. Nuestro equipo de expertos en periféricos está disponible para asesorar y recomendar los productos que mejor se adapten a las necesidades específicas de cada usuario, ya sea un jugador casual o un profesional de los esports. Respondemos a todas las consultas técnicas con precisión y rapidez, asegurándonos de que cada cliente encuentre el periférico perfecto para mejorar su experiencia de juego.</p>

                    <p>Las redes sociales se han convertido en una parte fundamental de nuestra estrategia de conexión con la comunidad. A través de nuestros canales, compartimos análisis detallados de productos, tips de configuración, noticias sobre las últimas tecnologías en periféricos y organizamos eventos y sorteos para mantener una comunidad activa y comprometida. Esta presencia digital nos permite además recibir feedback directo sobre nuevos productos y tendencias del mercado.</p>

                    <p>También nos enorgullece ofrecer una línea de productos reacondicionados de alta gama. Nuestro equipo técnico especializado revisa, repara y certifica periféricos de calidad premium, permitiendo que más jugadores tengan acceso a equipamiento profesional a precios competitivos. Cada producto reacondicionado pasa por rigurosas pruebas de calidad y rendimiento, garantizando que cumple con los estándares exigentes de la comunidad.</p>
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