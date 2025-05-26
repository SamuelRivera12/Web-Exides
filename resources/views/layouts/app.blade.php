<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mi Cuenta</title>

    <link rel="shortcut icon" href="images/Exides-Logo.png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/app_styles.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<header>
    <nav>
        <div class="nav_logo">
            <a href="/">
                <img class="logo" src="{{ asset('images/Exides-Logo.png') }}" alt="Logo">
            </a>
        </div>
        <div class="nav_items" id="navItems">
            <a href="sobrenosotros">Sobre Nosotros</a>
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
        <h1>Mi Cuenta</h1>
    </section>
</header>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
