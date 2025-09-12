<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Muestra el panel de admin
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Opcional: verifica que sea realmente el admin
        if ($user->email !== 'admin@gmail.com') {
            abort(403);
        }

        return view('admin', compact('user'));
    }
}
