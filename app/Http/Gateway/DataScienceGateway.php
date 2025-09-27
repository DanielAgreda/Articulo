<?php

namespace App\Http\Gateway;

use App\Http\Controllers\Controller;
use App\Services\DataScienceService;
use Illuminate\Http\JsonResponse;

class DataScienceGateway extends Controller
{
    protected DataScienceService $dsService;

    public function __construct(DataScienceService $dsService)
    {
        $this->dsService = $dsService;
    }

    public function predict(int $c1, int $c2): JsonResponse
    {
        try {
            $payload = $this->dsService->predictMatch($c1, $c2);

            return response()->json([
                'success' => true,
                'data' => $payload
            ]);
        } catch (\Throwable $e) {
            \Log::error('DataScienceGateway error: ' . $e->getMessage(), ['c1' => $c1, 'c2' => $c2]);

            return response()->json([
                'success' => false,
                'message' => 'Error en servicio de predicción'
            ], 500);
        }
    }
}
