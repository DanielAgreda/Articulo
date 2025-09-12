<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciclista;

class CiclistaController extends Controller
{
    // Constructor opcional si ya proteges con middleware en rutas
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar el formulario de registro de ciclista.
     */
    public function create()
    {
        return view('ingresar_miembros');
    }

    /**
     * Procesar el registro y almacenar en BD.
     */
    public function store(Request $request)
    {
        // 1. Validar datos
        $data = $request->validate([
            'nombres'          => ['required','string','max:100'],
            'apellidos'        => ['required','string','max:100'],
            'correo'           => ['required','email','max:150'],
            'equipo'           => ['required','string','max:100'],
            'telefono'         => ['required','digits_between:7,15'],
            'fecha_nacimiento' => ['required','date'],
            'pais_origen'      => ['required','string','max:50'],
            'referencia_cicla' => ['required','string','max:100'],
            'tipo_carrera'     => ['required','in:camino,ciclocross,montana,pavimento'],
            'nombre_carrera'   => ['required','string','max:100'],
            'pais_carrera'     => ['required','string','max:50'],
            'imagen'           => ['required','image','max:2048'],
        ]);

        // 2. Subir imagen a storage/app/public/ciclistas
        $path = $request->file('imagen')->store('ciclistas','public');
        $data['imagen'] = 'storage/'.$path;

        // 3. Crear registro
        Ciclista::create($data);

        // 4. Redirigir con mensaje
        return redirect()->route('equipos.index')
                         ->with('message','Ciclista registrado con éxito.');
    }
}
