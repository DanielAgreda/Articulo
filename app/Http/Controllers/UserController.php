<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Aplica el middleware auth a todas las rutas de este controlador
    /**
     * Muestra el panel de usuario (usuario.blade.php)
     */
    public function dashboard()
    {
        $user = Auth::user();           // Obtiene el usuario autenticado
        return view('usuario', compact('user'));
    }
}
