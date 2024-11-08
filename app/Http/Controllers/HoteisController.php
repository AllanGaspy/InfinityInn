<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HoteisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('');
      $hoteis = Hotel::all();
      return view('hoteis.hoteis_index', compact('hoteis'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //view do create
        return view('hoteis.hoteis_create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //Função Create, com fim retornando a view categoria index
        $validated = $request -> validate([
            'hotel' => 'required|min:5',
            'estado' => 'required|min:5',
            'municipio' => 'required|min:5',
            'quartos' => 'required|min:1',

        ]);

        $hoteis = new Hotel();
        $hoteis->estado = $request->estado;
        $hoteis->municipio = $request->municipio;
        $hoteis->hotel = $request->hotel;
        $hoteis->quartos = $request->quartos;
        $hoteis->save();


        return redirect()->route('hoteis.index')->with('mensagem', 'Hotel    cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
         //Retorna a visuzalição (view) do elemento rote show
       $hoteis = Hotel::find($id);
       return view('hoteis.hoteis_show', compact('hoteis'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hoteis = Hotel::find($id);
        return view('hoteis.hoteis_edit', compact('hoteis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request -> validate([
            'hotel' => 'required|min:5',
            'estado' => 'required|min:5',
            'municipio' => 'required|min:5',
            'quartos' => 'required|min:1',

        ]);

        $hoteis = new Hotel();
        $hoteis->estado = $request->estado;
        $hoteis->municipio = $request->municipio;
        $hoteis->hotel = $request->hotel;
        $hoteis->quartos = $request->quartos;
        $hoteis->save();

        return redirect()->route('hoteis.index')->with('mensagem', 'Categoria cadastrada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hoteis = hotel::find($id);
        $hoteis -> delete();

        return redirect() -> route('hoteis.index') -> with('mensagem', 'Categoria deletada com sucesso !');
    }
}
