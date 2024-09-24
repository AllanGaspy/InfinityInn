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
       $categorias = Categoria::all();
       return view('categoria.categoria_index', compact('categorias'));
      // dd ();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.categoria_create');
        //dd('funfou');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'nome' => 'required|min:5',

            //dd($request -> all());
        ]);
           
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // $categorias = Categoria::find($id);
       // return view('categoria.categoria_show', compact('categorias'));
        //dd('show' . $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
