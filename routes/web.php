<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página de inicio
Route::view('/', 'index')->name('home');

// Páginas públicas del navbar
Route::view('/carreras',  'carreras')->name('carreras');
Route::view('/equipo',    'equipo')->name('equipo');
Route::view('/noticias',  'noticias')->name('noticias');
Route::view('/historia',  'historia')->name('historia');
Route::view('/contacto',  'contacto')->name('contacto');

// Procesar formulario de contacto
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

// Formulario de Login
Route::get('/login', [AuthController::class, 'showLoginForm'])
     ->name('login');

// Procesar Login
Route::post('/login', [AuthController::class, 'login'])
     ->name('login.submit');

// Formulario de Registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])
     ->name('register');

// Procesar Registro
Route::post('/register', [AuthController::class, 'register'])
     ->name('register.submit');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])
     ->name('logout');

// Vista Usuario
Route::middleware('auth')
    ->get('/usuario', [UserController::class, 'dashboard'])
    ->name('usuario');



// Auth público (vist­­as planas por ahora)
Route::view('/registro',       'auth.register')->name('registro');
Route::view('/inicio-sesion',  'auth.login')->name('inicio-sesion');

// Tickets: esqueleto con closure para evitar el error de ruta no definida
Route::get('/tickets', function () {
    // Más adelante aquí listaremos tickets
    return back();
})->name('tickets.index');

Route::post('/tickets', function (Request $request) {
    // Placeholder: simula creación y retorna al index con mensaje
    return redirect('/')
           ->with('message', 'Tu ticket ha sido recibido (placeholder).');
})->name('tickets.store');
