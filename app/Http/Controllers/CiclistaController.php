<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciclista;

class CiclistaController extends Controller
{
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

    public function edit()
    {
        return view('edit'); // resources/views/edit.blade.php
    }

    /**
     * Actualiza el ciclista. El formulario debe enviar el campo 'id' con el id a actualizar.
     * Luego retorna de vuelta a la vista de edición con mensaje.
     */
    public function update(Request $request)
    {
        // Validación básica
        $data = $request->validate([
            'id'                => 'required|integer|exists:ciclista,id_ciclista',
            'nombres'           => 'required|string|max:100',
            'apellidos'         => 'required|string|max:100',
            'correo'            => 'required|email|max:150',
            'equipo'            => 'required|string|max:100',
            'telefono'          => 'required|numeric',
            'fecha_nacimiento'  => 'required|date',
            'pais_origen'       => 'required|string|max:50',
            'referencia_cicla'  => 'required|string|max:100',
            'tipo_carrera'      => 'required|in:camino,ciclocross,montana,pavimento',
            'nombre_carrera'    => 'required|string|max:100',
            'pais_carrera'      => 'required|string|max:50',
            'imagen_ciclista'   => 'nullable|image|max:2048',
        ]);

        // Obtener el registro por id proporcionado en el formulario
        $ciclista = Ciclista::findOrFail($data['id']);

        // Manejo de imagen si se sube (guardamos en public/assets/ciclistas, igual que tus vistas previas)
        if ($request->hasFile('imagen_ciclista')) {
            $file = $request->file('imagen_ciclista');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $destination = public_path('assets/ciclistas');

            if (! file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            // Borrar anterior si existe y está en assets/
            if ($ciclista->imagen && strpos($ciclista->imagen, 'assets/') === 0) {
                $oldPath = public_path($ciclista->imagen);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $ciclista->imagen = 'assets/ciclistas/' . $filename;
        }

        // Actualizar campos (excepto imagen ya manejada)
        $ciclista->nombres = $data['nombres'];
        $ciclista->apellidos = $data['apellidos'];
        $ciclista->correo = $data['correo'];
        $ciclista->equipo = $data['equipo'];
        $ciclista->telefono = $data['telefono'];
        $ciclista->fecha_nacimiento = $data['fecha_nacimiento'];
        $ciclista->pais_origen = $data['pais_origen'];
        $ciclista->referencia_cicla = $data['referencia_cicla'];
        $ciclista->tipo_carrera = $data['tipo_carrera'];
        $ciclista->nombre_carrera = $data['nombre_carrera'];
        $ciclista->pais_carrera = $data['pais_carrera'];

        $ciclista->save();

        // Volver a la vista de edición como pediste
        return redirect()->route('ciclistas.edit')
                         ->with('message', 'Ciclista actualizado con éxito.');
    }

    public function delete()
    {
        return view('delete'); // resources/views/delete.blade.php
    }

    public function destroy(Request $request)
    {
        // Validar que se reciba un id válido y que exista en la tabla
        $data = $request->validate([
            'id' => 'required|integer|exists:ciclista,id_ciclista'
        ]);

        $id = $data['id'];

        $ciclista = Ciclista::findOrFail($id);

        // Borrar imagen física si existe y está en assets/
        if (! empty($ciclista->imagen) && strpos($ciclista->imagen, 'assets/') === 0) {
            $path = public_path($ciclista->imagen);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        // Eliminar registro
        $ciclista->delete();

        // Volver a la vista de eliminación con mensaje
        return redirect()->route('ciclistas.delete')
                         ->with('message', 'Ciclista eliminado correctamente.');
    }

}
