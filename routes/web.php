<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Rutas de autenticación con verificación de email activada
Auth::routes(['verify' => true]);

// Ruta principal (página de inicio pública)
Route::get('/', function () {
    return view('index');
});

// Ruta home protegida por autenticación y verificación de email
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

// Rutas públicas para otras vistas
Route::view('/ficcion', 'ficcion');
Route::view('/tienda', 'tienda');
Route::view('/noticias', 'noticias');
Route::view('/fantasia', 'fantasia');
Route::view('/romance', 'romance');
Route::view('/sobrenosotros', 'sobrenosotros');
Route::view('/panel', 'panel');

// Rutas con controlador
Route::get('/producto/{id}', [ProductoController::class, 'mostrarProducto']);
Route::get('/pasarela-pago', [CartController::class, 'showPasarelaPago']);
