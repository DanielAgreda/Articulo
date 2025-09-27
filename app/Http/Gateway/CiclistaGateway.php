<?php

namespace App\Http\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CiclistaService;
use App\Http\Requests\CompareCiclistasRequest;
use App\Http\Resources\CiclistaResource;
use Illuminate\Http\JsonResponse;

class CiclistaGateway extends Controller
{
    protected CiclistaService $service;

    public function __construct(CiclistaService $service)
    {
        $this->service = $service;
    }

    public function getHistorial($id): JsonResponse|CiclistaResource
    {
        $historial = $this->service->getHistorial((int)$id);

        if (!$historial) {
            return response()->json(['message' => 'Ciclista no encontrado'], 404);
        }

        return new CiclistaResource($historial);
    }

    public function comparar(CompareCiclistasRequest $request): JsonResponse
    {
        $c1 = (int) $request->input('c1');
        $c2 = (int) $request->input('c2');

        $result = $this->service->compararCiclistas($c1, $c2);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }
}
