<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return '/home';
        }

        return '/home';
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        
        if ($user) {
            $user->ultima_sesion = Carbon::now();
            $user->estado = 'inactivo';
            $user->save();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Puedes cambiar esto si quieres redirigir a otro lugar
    }

    protected function authenticated(Request $request, $user)
{
    if (!$user->hasVerifiedEmail()) {
        Auth::logout();
        return redirect('/login')->withErrors([
            'email' => 'Debes verificar tu correo electrónico antes de iniciar sesión.'
        ]);
    }

    $user->estado = 'Activo';
    $user->save();
}

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
