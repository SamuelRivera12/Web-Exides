<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exides</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome_styles.css') }}">
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
        </nav>
        <section class="textoheader">
            <h1>Bienvenido a Exides</h1>
            <h4>Tu tienda de confianza en periféricos y equipamiento profesional desde 2005.</h4>
        </section>
    </header>

    <div class="contenedor">
        <section class="textoheader">
            <h1>Bienvenido a Exides</h1>
            <h4>Tu tienda de confianza en periféricos y equipamiento profesional desde 2005.</h4>
        </section>
    </div>
</body>
</html>
