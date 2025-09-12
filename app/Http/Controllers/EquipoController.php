<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciclista;
use App\Models\User;

class EquipoController extends Controller
{
    /**
     * Muestra el formulario para ingresar correo + equipo.
     */
    public function index()
    {
        return view('mostrar_equipo');
    }

    /**
     * Procesa el envío, valida datos, busca manager y ciclistas.
     */
    public function show(Request $request)
    {
        // 1. validar inputs
        $data = $request->validate([
            'email'  => ['required', 'email'],
            'equipo' => ['required', 'string', 'max:250'],
        ]);

        // 2. existe el manager?
        $manager = User::where('email', $data['email'])->first();
        if (! $manager) {
            return back()
                ->withErrors(['email' => 'El correo del manager no existe'])
                ->withInput();
        }

        // 3. obtener ciclistas del equipo
        $ciclistas = Ciclista::where('equipo', $data['equipo'])->get();
        if ($ciclistas->isEmpty()) {
            return back()
                ->withErrors(['equipo' => 'No se encontraron ciclistas para ese equipo'])
                ->withInput();
        }

        // 4. devolver la misma vista con los resultados
        return view('mostrar_equipo', [
            'ciclistas' => $ciclistas,
        ]);
    }
}
