<?php

use Illuminate\Support\Facades\Route;
use App\Http\Gateway\CiclistaGateway;
use App\Http\Gateway\DataScienceGateway;

Route::prefix('v1')->group(function () {
    Route::get('/ciclistas/{id}/historial', [CiclistaGateway::class, 'getHistorial']);
    Route::get('/ciclistas/comparar', [CiclistaGateway::class, 'comparar']); // ?c1=1&c2=2
    Route::get('/prediccion/{c1}/{c2}', [DataScienceGateway::class, 'predict']);
});
