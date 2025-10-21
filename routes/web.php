<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\CiclistaController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí definimos todas las rutas de tu aplicación,
| ahora actualizadas con autenticación JWT.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::view('/',            'index')->name('home');
Route::view('/carreras',    'carreras')->name('carreras');
Route::view('/equipo',      'equipo')->name('equipo');
Route::view('/noticias',    'noticias')->name('noticias');
Route::view('/historia',    'historia')->name('historia');
Route::view('/contacto',    'contacto')->name('contacto');

// Procesar formulario de contacto
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

/*
|--------------------------------------------------------------------------
| Autenticación (JWT)
|--------------------------------------------------------------------------
|
| Login, registro y logout gestionados por JWT.
| El middleware 'jwt.auth' se usará para proteger las rutas.
|
*/

// Formularios
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Procesar login y registro
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas protegidas por JWT
|--------------------------------------------------------------------------
|
| Solo se puede acceder con un token válido.
| Usamos el middleware 'jwt.auth' proporcionado por tymon/jwt-auth.
|
*/

Route::middleware(['jwt.auth'])->group(function () {

    // Dashboard de usuario
    Route::get('/usuario', [UserController::class, 'dashboard'])->name('usuario');

    // ✅ Dashboard de admin protegido con JWT
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

    // Equipos
    Route::get('/mostrar_equipo', [EquipoController::class, 'index'])->name('equipos.index');
    Route::post('/mostrar_equipo', [EquipoController::class, 'show'])->name('equipos.show');

    // Ciclistas
    Route::get('/ingresar_miembros', [CiclistaController::class, 'create'])->name('ciclistas.create');
    Route::post('/ingresar_miembros', [CiclistaController::class, 'store'])->name('ciclistas.store');
    Route::get('/edit', [CiclistaController::class, 'edit'])->name('ciclistas.edit');
    Route::put('/edit', [CiclistaController::class, 'update'])->name('ciclistas.update');
    Route::get('/delete', [CiclistaController::class, 'delete'])->name('ciclistas.delete');
    Route::delete('/delete', [CiclistaController::class, 'destroy'])->name('ciclistas.destroy');

    // Tickets
    Route::get('/tickets', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
});

/*
|--------------------------------------------------------------------------
| Vistas planas de auth (opcional)
|--------------------------------------------------------------------------
*/

Route::view('/registro', 'auth.register')->name('registro');
Route::view('/inicio-sesion', 'auth.login')->name('inicio-sesion');
