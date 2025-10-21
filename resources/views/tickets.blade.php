@extends('layouts.user')

@section('title', 'Registro de Ticket')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/ticket.css') }}">
@endpush

@section('content')
    <div class="background-aurora"></div>

    <div id="contenido">
        <div class="registro-container">
            <h1>Registro de ticket</h1>

            @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="registro-ticket" action="{{ route('tickets.store') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label for="ticket">Titulo del ticket</label>
                    <input type="text" id="ticket" name="ticket" placeholder="Titulo del ticket" required
                        value="{{ old('ticket') }}">
                </div>

                <div class="input-group">
                    <label for="ticket-descripcion">Describe el ticket</label>
                    <textarea name="ticket_descripcion" id="ticket-descripcion" placeholder="Describe tu problema">{{ old('ticket_descripcion') }}</textarea>
                </div>

                <button type="submit" class="registro-button" id="registro-ticket">Crear Ticket</button>
            </form>
        </div>
    </div>
@endsection
