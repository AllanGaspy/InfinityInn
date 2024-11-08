<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Localizacao;

class LocalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //index da localizacao (view)
       $localizacao = Localizacao::all();
       return view('localizacao.localizacao_index', compact('localizacao'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //view do create
        return view('localizacao.localizacao_create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //Função Create, com fim retornando a view categoria index
        $validated = $request -> validate([
            'hotel' => 'required|min:5',
            'Estado' => 'required|min:5',
            'quartos' => 'required|min:1',

        ]);

        $localizacao = new Localizacao();
        $localizacao->localizacao = $request->localizacao;
        $localizacao->hotel = $request->hotel;
        $localizacao->quartos = $request->quartos;
        $localizacao->save();


        return redirect()->route('localizacao.index')->with('mensagem', 'Localização cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
         //Retorna a visuzalição (view) do elemento rote show
         $localizacao = Localizacao::all();
         return view('localizacao.localizacao_show', compact('localizacao'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $localizacao = Localizacao::all();
        return view('localizacao.localizacao_edit', compact('localizacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request -> validate([
            'hotel' => 'required|min:5',
            'localizacao' => 'required|min:5',
            'quartos' => 'required|min:1'

        ]);

        $localizacao = Localizacao::find($id);
        $localizacao->localizacao = $request->localizacao;
        $localizacao->hotel = $request->hotel;
        $localizacao->quartos = $request->quartos;
        $localizacao->save();

        

        return redirect()->route('localizacao.index')->with('mensagem', 'localizacao cadastrada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $localizacao = Localizacao::find($id);
        $localizacao -> delete();

        return redirect() -> route('localizacao.index') -> with('mensagem', 'localizacao deletada com sucesso !');
    }
}
