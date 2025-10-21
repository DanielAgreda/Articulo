<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Muestra el formulario para crear un ticket
    public function create()
    {
        return view('tickets');
    }

    // Valida y guarda el ticket, luego vuelve al formulario con mensaje
    public function store(Request $request)
    {
        $data = $request->validate([
            'ticket' => 'required|string|max:255',
            'ticket_descripcion' => 'nullable|string',
        ]);

        // Asociar ticket al usuario autenticado (opcional)
        $ticket = new Ticket();
        $ticket->titulo = $data['ticket'];
        $ticket->descripcion = $data['ticket_descripcion'] ?? null;
        $ticket->user_id = Auth::id();
        $ticket->estado = 'abierto';
        $ticket->save();

        return redirect()->route('tickets.create')
                         ->with('message', 'Ticket creado correctamente.');
    }
}
