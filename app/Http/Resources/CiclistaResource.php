<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CiclistaResource extends JsonResource
{
    public function toArray($request): array
    {
        // $this->resource puede ser array o modelo
        $data = is_array($this->resource) ? $this->resource : $this->resource->toArray();

        return [
            'id' => $data['id'] ?? null,
            'nombre' => $data['nombre'] ?? null,
            'victorias' => $data['victorias'] ?? 0,
            'podios' => $data['podios'] ?? 0,
            'carreras' => $data['carreras'] ?? []
        ];
    }
}
