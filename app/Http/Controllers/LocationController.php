<?php
namespace App\Http\Controllers;

use App\Models\Estado;  // Modelo para o Estado
use App\Models\Cidade;  // Modelo para a Cidade
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Exibe o formulário com os selects de Estado e Cidade
    public function index()
    {
        $estados = Estado::all(); // Recuperar todos os estados para o primeiro select
        return view('localidades.index', compact('estados'));
    }

    // Retorna as cidades baseadas no estado selecionado
    public function getCidades($estadoId)
    {
        $cidades = Cidade::where('uf', $estadoId)->get(); // Buscar as cidades para o estado selecionado
        return response()->json($cidades); // Retornar as cidades como JSON
    }
}
