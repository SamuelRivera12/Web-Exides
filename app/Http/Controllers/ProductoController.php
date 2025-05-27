<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    public function mostrarProducto($id)
    {
        try {
            $response = Http::get("http://localhost:3000/productos/{$id}");
            
            if (!$response->successful()) {
                return redirect()->route('tienda')->with('error', 'Producto no encontrado');
            }

            $producto = $response->json();
            return view('producto', compact('producto'));
        } catch (\Exception $e) {
            return redirect()->route('tienda')->with('error', 'Error al cargar el producto');
        }
    }
}