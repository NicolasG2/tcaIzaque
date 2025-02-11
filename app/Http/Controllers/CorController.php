<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Cor::orderBy('nome')->get();
        return view('cores.index', compact('data'));
    }

    
    public function create()
    {
        return view('cores.create');
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
                $reg = new Cor();
                $reg->nome = $request->nome;

                $reg->save();

                return redirect()->route('cores.index')->with('success', 'Cor criada com sucesso');
 
        } else {
            return back()->withInput()->withErrors($request->validate($regras, $msgs));
        }
    }
    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $dados = Cor::find($id);
    
        if (!isset($dados)) {
            return "<h1>ID: $id não encontrado!</h1>";
        }
    
        return view('cores.edit', compact('dados'));    
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

        $reg = Cor::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
          
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }
    
        return redirect()->route('cores.index');
    }

    
    public function destroy($id)
    {
        if (!Cor::destroy($id)) { 
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return redirect()->route('cores.index')->with('success', 'Cor excluída com sucesso!');
    }

}