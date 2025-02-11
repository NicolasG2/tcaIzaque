<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Carro;

class RelatorioController extends Controller
{
    public function createReport($tipo = 0) 
    {
        $data = [];

        switch ($tipo) {
            default:
                $data = $this->getDataGeneral();
                $html = view('relatorio.geral', compact('data'))->render();
                
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                return $dompdf->stream('relatorio-geral.pdf');
        }
    }

    private function getDataGeneral() 
    {
        $carro = Carro::orderBy('id')->get();
        $data = [];
        $cont = 0;

        foreach ($carro as $d) {
            $data[$cont]['placa'] = $d->placa ?? '-';
            $data[$cont]['modelo_id'] = optional($d->modelo)->nome ?? '-';
            $data[$cont]['cor_id'] = optional($d->cor)->nome ?? '-';
            $data[$cont]['estado_id'] = optional($d->estado)->nome ?? '-';
            $cont++;
        }

        return $data;
    }
}