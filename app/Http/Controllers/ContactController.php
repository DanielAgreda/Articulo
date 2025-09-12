<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Aquí procesas $request->nombre, $request->apellido, etc.
        // Por ejemplo, enviarlo por mail, guardarlo en BD o redirigir con mensaje.
        return back()->with('message', '¡Gracias por contactarnos!');
    }
}
