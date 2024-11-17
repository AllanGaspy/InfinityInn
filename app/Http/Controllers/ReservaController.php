<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Reserva;


class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.reservas_index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reservas = Reserva::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('reservas.reservas_create', compact('estados', 'cidades'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'nome' => 'required|min:3',
            'hotel' => 'required|min:5',
            'quartos' => 'required|min:1',

        ]);

        $reservas = new Reserva();
        $reservas->nome = $request->nome;
        $reservas->estado_id = $request->estado_id;
        $reservas->cidade_id = $request->cidade_id;
        $reservas->hotel = $request->hotel;
        $reservas->quartos = $request->quartos;
        $reservas->save();

        return redirect()->route('reservas.index')->with('mensagem', 'Reserva cadastrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservas = Reserva::find($id);
       return view('reservas.reservas_show', compact('reservas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservas = Reserva::find($id);
        $estados = Estado::all();
        $cidades = Cidade::all();
        $hotel = Hotel::find($id);
        

        return view('reservas.reservas_edit', compact('estados', 'cidades' , 'hotel','reservas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request -> validate([
            'nome' => 'required|min:3',
            'hotel' => 'required|min:5',
            'quartos' => 'required|min:1',

        ]);

        $reservas = Reserva::find($id); 
        $reservas->nome = $request->nome;
        $reservas->estado_id = $request->estado_id;
        $reservas->cidade_id = $request->cidade_id;
        $reservas->hotel = $request->hotel;
        $reservas->quartos = $request->quartos;
        $reservas->save();

        return redirect()->route('reservas.index')->with('mensagem', 'Reserva editada com sucesso');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservas = Reserva::find($id);
        $reservas -> delete();

        return redirect() -> route('reservas.index') -> with('mensagem', 'Reserva deletada com sucesso !');
    }
}
