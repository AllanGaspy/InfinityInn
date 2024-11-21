<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Estado;
use App\Models\Cidade;



class HoteisController extends Controller
{
    public function welcome()
    {
    $hoteis = Hotel::take(6)->get(); // Pega os 6 primeiros hotéis para exibição
    $estados = Estado::all();
    // dd($hoteis);
    return view('welcome', compact('hoteis','estados'));
    }

    public function buscar(Request $request)
    {
        $estadoId = $request->input('estado_id');
        $cidadeId = $request->input('cidade_id');

        // Query base para buscar hotéis
        $query = Hotel::query();

        // Adiciona filtros, se fornecidos
        if ($estadoId) {
            $query->where('estado_id', $estadoId);
        }
        if ($cidadeId) {
            $query->where('cidade_id', $cidadeId);
        }

        // Obtem os resultados filtrados
        $hoteis = $query->get();

        // Retorna a view com os resultados
        return view('hoteis.hoteis_resultado', compact('hoteis'));
    }

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
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('hoteis.hoteis_create', compact('estados', 'cidades'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Função Create, com fim retornando a view categoria index
        $validated = $request -> validate([
            'hotel' => 'required|min:5',
            'estado_id' => 'required',
            'cidade_id' => 'required',
            'descricao',
            'valor_diaria' => 'required',
            'quartos' => 'required|min:1',

        ]);

        $hoteis = new Hotel();
        $hoteis->estado_id = $request->estado_id;
        $hoteis->cidade_id = $request->cidade_id;
        $hoteis->hotel = $request->hotel;
        $hoteis->quartos = $request->quartos;
        $hoteis->descricao = $request->descricao;
        $hoteis->valor_diaria = $request->valor_diaria;

        //tranformando as imagens em base64
        $totalImages = count($request->images);
        $jsonImages = [];
        for($i = 0; $i < $totalImages; $i++){
            $content = $request->file("images");
            $image = file_get_contents($content[$i]);
            $image64 = base64_encode($image);
            $jsonImages[] = $image64;
        }

        $hoteis->images = $jsonImages;
        $hoteis->save();

        return redirect()->route('hoteis.index')->with('mensagem', 'Hotel  cadastrado com sucesso');

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
        $estados = Estado::all();
        $cidades = Cidade::all();
        $hotel = Hotel::find($id);

        return view('hoteis.hoteis_edit', compact('estados', 'cidades' , 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            $validated = $request->validate([
            'hotel' => 'required|min:5',
            'estado_id' => 'required',
            'cidade_id' => 'required',
            'quartos' => 'required|min:1',
        ]);

        $hoteis = Hotel::find($id);
        $hoteis->estado_id = $request->estado_id;
        $hoteis->cidade_id = $request->cidade_id;
        $hoteis->hotel = $request->hotel;
        $hoteis->quartos = $request->quartos;

        // Obter imagens existentes (se houver)
        $currentImages = $hoteis->images ?? [];

        // Remover imagens marcadas
        if ($request->has('remove_images')) {
            foreach ($request->input('remove_images') as $index) {
                unset($currentImages[$index]);
            }
        }

        // Transformar novas imagens em base64 e adicionar ao array existente
        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $file) {
                $image = file_get_contents($file->getRealPath());
                $image64 = base64_encode($image);
                $newImages[] = $image64;
            }
            $currentImages = array_merge($currentImages, $newImages);
        }

        // Atualizar o campo images com as alterações
        $hoteis->images = array_values($currentImages); // Reorganizar índices do array
        $hoteis->save();


        return redirect()->route('hoteis.index')->with('mensagem', 'Hotel editado com sucesso');


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
