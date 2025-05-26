<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showPasarelaPago(Request $request)
    {
        $cartData = $request->query('cart');

        if ($cartData) {
            $cart = json_decode(urldecode($cartData), true) ?? [];
        } else {
            $cart = [];
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });

        return view('pasarela_pago', [
            'cart' => $cart,
            'total' => $total,
        ]);
    }
}