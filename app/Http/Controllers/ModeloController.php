<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Modelo::orderBy('nome')->get();
        return view('modelos.index', compact('data'));
    }

    
    public function create()
    {
        $marcas = Marca::all();

        return view('modelos.create', compact('marcas'));
    }

    
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:30|min:2',
            'marca_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        if ($request->validate($regras, $msgs)) {
                $reg = new Modelo();
                $reg->nome = $request->nome;
                $reg->marca_id = $request->marca_id;

                $reg->save();

                return redirect()->route('modelos.index')->with('success', 'Modelo criado com sucesso');
 
        } else {
            return back()->withInput()->withErrors($request->validate($regras, $msgs));
        }
    }
    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $dados = Modelo::find($id);
        $marcas = Marca::all();

        if (!$dados) {
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return view('modelos.edit', compact('dados', 'marcas'));    
    }


    public function update(Request $request, $id) {
     
        $regras = [
            'nome' => 'required|max:30|min:2',
            'marca_id' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Modelo::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
            $reg->marca_id = $request->marca_id;
          
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }
    
        return redirect()->route('modelos.index');
    }

    
    public function destroy($id)
    {
        if (!Modelo::destroy($id)) { 
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return redirect()->route('modelos.index')->with('success', 'Modelo excluído com sucesso!');
    }

}