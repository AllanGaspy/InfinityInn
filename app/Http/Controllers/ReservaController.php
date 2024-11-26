<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservaController extends Controller
{


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
    $estados = Estado::all();
    $cidades = Cidade::all();
    $hoteis = Hotel::all();  // Adicione esta linha para buscar todos os hotéis
    return view('reservas.reservas_create', compact('estados', 'cidades', 'hoteis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|min:3',
            'hotel_id' => 'required|exists:hoteis,id',
            'quartos' => 'required|min:1',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        // Verificar disponibilidade do hotel
        $hotel = Hotel::find($request->hotel_id);
        $check_in = Carbon::parse($request->check_in);
        $check_out = Carbon::parse($request->check_out);

        // Verificar se o hotel já tem reservas no período selecionado
        $conflito = Reserva::where('hotel_id', $hotel->id)
            ->where(function($query) use ($check_in, $check_out) {
                $query->whereBetween('check_in', [$check_in, $check_out])
                      ->orWhereBetween('check_out', [$check_in, $check_out])
                      ->orWhere(function ($query) use ($check_in, $check_out) {
                          $query->where('check_in', '<=', $check_in)
                                ->where('check_out', '>=', $check_out);
                      });
            })
            ->exists();

        if ($conflito) {
            return back()->withErrors(['message' => 'O hotel não está disponível nas datas selecionadas.']);
        }

        // Criar a nova reserva
        $reserva = new Reserva();
        $reserva->nome = $request->nome;
        $reserva->hotel_id = $request->hotel_id;
        $reserva->estado_id = $request->estado_id;
        $reserva->cidade_id = $request->cidade_id;
        $reserva->quartos = $request->quartos;
        $reserva->check_in = $check_in;
        $reserva->check_out = $check_out;
        $reserva->guests = $request->guests;
        $reserva->save();

        return redirect()->route('reservas.index')->with('mensagem', 'Reserva cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = Reserva::find($id);
        return view('reservas.reservas_show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reserva = Reserva::find($id);
        $estados = Estado::all();
        $cidades = Cidade::all();
        $hoteis = Hotel::all(); // Buscar todos os hotéis para poder selecionar o hotel ao editar

        return view('reservas.reservas_edit', compact('reserva', 'hoteis', 'estados', 'cidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|min:3',
            'hotel_id' => 'required|exists:hoteis,id',
            'quartos' => 'required|min:1',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        $reserva = Reserva::find($id);
        $hotel = Hotel::find($request->hotel_id);
        $check_in = Carbon::parse($request->check_in);
        $check_out = Carbon::parse($request->check_out);

        // Verificar disponibilidade do hotel nas novas datas, ignorando a reserva atual
        $conflito = Reserva::where('hotel_id', $hotel->id)
            ->where('id', '!=', $reserva->id)  // Ignorar a própria reserva
            ->where(function($query) use ($check_in, $check_out) {
                $query->whereBetween('check_in', [$check_in, $check_out])
                    ->orWhereBetween('check_out', [$check_in, $check_out])
                    ->orWhere(function ($query) use ($check_in, $check_out) {
                        $query->where('check_in', '<=', $check_in)
                                ->where('check_out', '>=', $check_out);
                    });
            })
            ->exists();

        if ($conflito) {
            return back()->withErrors(['message' => 'O hotel não está disponível nas novas datas selecionadas.']);
        }

        // Atualizar a reserva
        $reserva->nome = $request->nome;
        $reserva->hotel_id = $request->hotel_id;
        $reserva->estado_id = $request->estado_id;
        $reserva->cidade_id = $request->cidade_id;
        $reserva->quartos = $request->quartos;
        $reserva->check_in = $check_in;
        $reserva->check_out = $check_out;
        $reserva->guests = $request->guests;
        $reserva->save();

        return redirect()->route('reservas.index')->with('mensagem', 'Reserva editada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();

        return redirect()->route('reservas.index')->with('mensagem', 'Reserva deletada com sucesso!');
    }
}
