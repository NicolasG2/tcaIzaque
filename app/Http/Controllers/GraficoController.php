<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Carro;

class GraficoController extends Controller
{

    public function loadDataGraphs()
    {
        $marcas = Carro::join('modelos', 'carros.modelo_id', '=', 'modelos.id')
            ->join('marcas', 'modelos.marca_id', '=', 'marcas.id')
            ->select('marcas.nome as marca', DB::raw('count(*) as total'))
            ->groupBy('marcas.nome')
            ->pluck('total', 'marca');

        $cores = Carro::join('cors', 'carros.cor_id', '=', 'cors.id')
            ->select('cors.nome as cor', DB::raw('count(*) as total'))
            ->groupBy('cors.nome')
            ->pluck('total', 'cor');

        $modelos = Carro::join('modelos', 'carros.modelo_id', '=', 'modelos.id')
            ->select('modelos.nome as modelo', DB::raw('count(*) as total'))
            ->groupBy('modelos.nome')
            ->pluck('total', 'modelo');

        $estados = Carro::join('estados', 'carros.estado_id', '=', 'estados.id')
            ->select('estados.nome as estado', DB::raw('count(*) as total'))
            ->groupBy('estados.nome')
            ->pluck('total', 'estado');

        return view('templates.home', [
            'marcas' => $marcas,
            'cores' => $cores,
            'modelos' => $modelos,
            'estados' => $estados
        ]);
    }
}