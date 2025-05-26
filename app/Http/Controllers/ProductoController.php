<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrarProducto($id) 
    {
        $json = file_get_contents(public_path('assets/products.json'));
        $productos = json_decode($json, true);
        $producto = collect($productos)->firstWhere('id', (int)$id);
        
        if (!$producto) {
            abort(404);
        }
        
        return view('producto', ['producto' => $producto]);
    }
}