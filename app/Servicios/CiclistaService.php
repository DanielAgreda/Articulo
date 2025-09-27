<?php

namespace App\Services;

use App\Models\Ciclista;

class CiclistaService
{
    public function getHistorial(int $id): array|null
    {
        $c = Ciclista::with(['carreras'])->find($id);

        if (!$c) return null;

        $carreras = $c->relationLoaded('carreras') ? $c->carreras : collect();

        return [
            'id' => $c->id,
            'nombre' => $c->nombre,
            'victorias' => $c->victorias ?? 0,
            'podios' => $c->podios ?? 0,
            'carreras' => $carreras->map(function ($r) {
                return [
                    'id' => $r->id,
                    'nombre' => $r->nombre ?? null,
                    'fecha' => $r->fecha ?? null,
                    'puesto' => $r->pivot->puesto ?? null
                ];
            })->values()->all()
        ];
    }

    public function compararCiclistas(int $c1, int $c2): array
    {
        $a = Ciclista::find($c1);
        $b = Ciclista::find($c2);

        if (!$a || !$b) {
            abort(404, 'Uno o ambos ciclistas no existen');
        }

        $mejorVictorias = $a->victorias > $b->victorias ? $a->nombre : ($a->victorias < $b->victorias ? $b->nombre : 'Empate');

        return [
            'ciclista1' => ['id' => $a->id, 'nombre' => $a->nombre, 'victorias' => $a->victorias ?? 0],
            'ciclista2' => ['id' => $b->id, 'nombre' => $b->nombre, 'victorias' => $b->victorias ?? 0],
            'mejor_en_victorias' => $mejorVictorias
        ];
    }
}
