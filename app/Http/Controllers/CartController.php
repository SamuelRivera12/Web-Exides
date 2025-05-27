<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function showPasarelaPago(Request $request)
    {
        $cartData = $request->query('cart');

        if ($cartData) {
            $cart = json_decode(urldecode($cartData), true) ?? [];

            // Get all products once
            try {
                $response = Http::get("http://localhost:3000/productos");
                if ($response->successful()) {
                    $productos = $response->json();
                    
                    // Match products with cart items
                    foreach ($cart as &$item) {
                        $producto = collect($productos)->first(function($p) use ($item) {
                            return strtolower($p['nombre']) === strtolower($item['nombre']);
                        });
                        
                        if ($producto) {
                            $item['id_producto'] = $producto['id_producto'];
                        }
                    }
                }
            } catch (\Exception $e) {
                \Log::error("Error fetching products: " . $e->getMessage());
            }

            // Remove items without id_producto
            $cart = array_filter($cart, function($item) {
                return isset($item['id_producto']);
            });
        } else {
            $cart = [];
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });

        return view('pasarela_pago', [
            'cart' => array_values($cart),
            'total' => $total,
        ]);
    }
}