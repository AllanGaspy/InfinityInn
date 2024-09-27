<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //index do categoria (view)
       $categorias = Categoria::all();
       return view('categoria.categoria_index', compact('categorias'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //view do create
        return view('categoria.categoria_create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //Função Create, com fim retornando a view categoria index
        $validated = $request -> validate([
            'hotel' => 'required|min:5',
            'localizacao' => 'required|min:5',
            'quartos' => 'required|min:1',

        ]);

        $categoria = new Categoria();
        $categoria->localizacao = $request->localizacao;
        $categoria->hotel = $request->hotel;
        $categoria->quartos = $request->quartos;
        $categoria->save();


        return redirect()->route('categoria.index')->with('mensagem', 'Categoria cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
         //Retorna a visuzalição (view) do elemento rote show
       $categorias = Categoria::find($id);
       return view('categoria.categoria_show', compact('categorias'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categoria::find($id);
        return view('categoria.categoria_edit', compact('categorias'));
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

        $categoria = Categoria::find($id);
        $categoria->localizacao = $request->localizacao;
        $categoria->hotel = $request->hotel;
        $categoria->quartos = $request->quartos;
        $categoria->save();

        return redirect()->route('categoria.index')->with('mensagem', 'Categoria cadastrada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorias = Categoria::find($id);
        $categorias -> delete();

        return redirect() -> route('categoria.index') -> with('mensagem', 'Categoria deletada com sucesso !');
    }
}
