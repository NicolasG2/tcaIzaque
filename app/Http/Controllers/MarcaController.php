<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Marca::orderBy('nome')->get();
        return view('marcas.index', compact('data'));
    }

    
    public function create()
    {
        return view('marcas.create');
    }

    
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:30|min:2',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        if ($request->validate($regras, $msgs)) {
                $reg = new Marca();
                $reg->nome = $request->nome;

                $reg->save();

                return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso');
 
        } else {
            return back()->withInput()->withErrors($request->validate($regras, $msgs));
        }
    }
    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $dados = Marca::find($id);
    
        if (!isset($dados)) {
            return "<h1>ID: $id não encontrado!</h1>";
        }
    
        return view('marcas.edit', compact('dados'));    
    }
    

    public function update(Request $request, $id) {
     
        $regras = [
            'nome' => 'required|max:30|min:2',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Marca::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
          
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }
    
        return redirect()->route('marcas.index');
    }

    
    public function destroy($id)
    {
        if (!Marca::destroy($id)) { 
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return redirect()->route('marcas.index')->with('success', 'Marca excluída com sucesso!');
    }

}