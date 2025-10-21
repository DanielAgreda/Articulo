<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Http\Request;

class JwtMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            // Solo permitir acceso si el correo coincide con el admin
            if ($user->email !== 'admin@gmail.com') {
                return redirect('/')->withErrors(['error' => 'Acceso no autorizado.']);
            }

        } catch (Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Token inválido o expirado.']);
        }

        return $next($request);
    }
}
