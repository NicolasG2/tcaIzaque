<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Cor;
use App\Models\Estado;
use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Carro::orderBy('placa')->get();
        return view('carros.index', compact('data'));
    }

    public function create()
    {
        $modelos = Modelo::all();
        $estados = Estado::all();
        $cores = Cor::all();

        return view('carros.create', compact('modelos', 'estados', 'cores'));
    }

    public function store(Request $request)
    {
        $regras = [
            'placa' => ['required', 'regex:/^[A-Z]{3}-\d{4}$|^[A-Z]{3}-\d[A-Z]\d{2}$/'],
            'modelo_id' => 'required',
            'estado_id' => 'required',
            'cor_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "placa.regex" => "A placa do veículo deve seguir o formato ABC-1234 ou ABC-1D23.",
        ];

        $request->validate($regras, $msgs);

        $reg = new Carro();
        $reg->placa = $request->placa;
        $reg->modelo_id = $request->modelo_id;
        $reg->estado_id = $request->estado_id;
        $reg->cor_id = $request->cor_id;

        $reg->save();

        return redirect()->route('carros.index')->with('success', 'Carro criado com sucesso');
    }


    public function show($id){
    }

    public function edit($id)
    {
        $dados = Carro::find($id);
        $modelos = Modelo::all();
        $estados = Estado::all();
        $cores = Cor::all();

        if (!$dados) {
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return view('carros.edit', compact('dados', 'modelos', 'estados', 'cores'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'placa' => ['required', 'regex:/^[A-Z]{3}-\d{4}$|^[A-Z]{3}-\d[A-Z]\d{2}$/'],
            'modelo_id' => 'required',
            'estado_id' => 'required',
            'cor_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "placa.regex" => "A placa do veículo deve seguir o formato ABC-1234 ou ABC-1D23.",
        ];

        $request->validate($regras, $msgs);

        $reg = Carro::find($id);

        if (!$reg) {
            return "<h1>ID: $id não encontrado!</h1>";
        }

        $reg->placa = $request->placa;
        $reg->modelo_id = $request->modelo_id;
        $reg->estado_id = $request->estado_id;
        $reg->cor_id = $request->cor_id;

        $reg->save();

        return redirect()->route('carros.index');
    }

    public function destroy($id)
    {
        if (!Carro::destroy($id)) {
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return redirect()->route('carros.index')->with('success', 'Carro excluído com sucesso!');
    }
}
