<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\CiclistaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí definimos todas las rutas de tu aplicación, agrupadas por
| funcionalidad y middleware para que queden bien organizadas.
|
*/

/*
|---------------------------------------------------------------------------
| Rutas públicas
|---------------------------------------------------------------------------
*/

// Home y páginas estáticas del navbar
Route::view('/',            'index')->name('home');
Route::view('/carreras',    'carreras')->name('carreras');
Route::view('/equipo',      'equipo')->name('equipo');
Route::view('/noticias',    'noticias')->name('noticias');
Route::view('/historia',    'historia')->name('historia');
Route::view('/contacto',    'contacto')->name('contacto');

// Procesar formulario de contacto
Route::post('/contacto', [ContactController::class, 'store'])
     ->name('contacto.store');

/*
|---------------------------------------------------------------------------
| Autenticación
|---------------------------------------------------------------------------
|
| Rutas que muestran los formularios de login/registro y
| procesan los envíos correspondientes.
|
*/

// Mostrar formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])
     ->name('login');

// Procesar login
Route::post('/login', [AuthController::class, 'login'])
     ->name('login.submit');

// Mostrar formulario de registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])
     ->name('register');

// Procesar registro
Route::post('/register', [AuthController::class, 'register'])
     ->name('register.submit');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])
     ->name('logout');

/*
|---------------------------------------------------------------------------
| Rutas protegidas (sólo usuarios autenticados)
|---------------------------------------------------------------------------
|
| Dentro de este grupo todas las rutas requieren que el usuario
| haya pasado el middleware 'auth'.
|
*/

Route::middleware('auth')->group(function () {
    // Dashboard de usuario: muestra usuario.blade.php
    Route::get('/usuario', [UserController::class, 'dashboard'])
         ->name('usuario');
    // Dashboard de admin: muestra admin.blade.php
    Route::get('/admin', [AdminController::class, 'dashboard'])
         ->name('admin');

    // Mostrar formulario
    Route::get('/mostrar_equipo', [EquipoController::class, 'index'])
         ->name('equipos.index');

    // Procesar formulario
    Route::post('/mostrar_equipo', [EquipoController::class, 'show'])
         ->name('equipos.show');

    Route::get('/ingresar-miembros', [CiclistaController::class, 'create'])
         ->name('ciclistas.create');

    // Procesar envío
    Route::post('/ingresar-miembros', [CiclistaController::class, 'store'])
         ->name('ciclistas.store');


    // Ejemplo de CRUD de tickets (placeholders por ahora)
    Route::get('/tickets', function () {
        // Más adelante aquí listaremos tickets
        return back();
    })->name('tickets.index');

    Route::post('/tickets', function (Request $request) {
        // Placeholder: simula creación y retorna con mensaje
        return redirect('/')
               ->with('message', 'Tu ticket ha sido recibido (placeholder).');
    })->name('tickets.store');
});

/*
|---------------------------------------------------------------------------
| Vistas planas de auth (si aún no migraste estas a controladores)
|---------------------------------------------------------------------------
*/

Route::view('/registro',      'auth.register')->name('registro');
Route::view('/inicio-sesion', 'auth.login')->name('inicio-sesion');
