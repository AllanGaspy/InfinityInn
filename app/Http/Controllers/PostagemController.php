<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Postagem;
use App\Models\Comentario;



class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('');
      $postagens = Postagem::all();
      return view('postagem.postagem_index', compact('postagens'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //view do create
        $postagens = Postagem::all();
        $comentarios = Comentario::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('postagem.postagem_create', compact('estados', 'cidades','postagens','comentarios'));

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
            'quartos' => 'required|min:1',

        ]);

        $postagens = new Postagem();
        $postagens->estado_id = $request->estado_id;
        $postagens->cidade_id = $request->cidade_id;
        $postagens->hotel = $request->hotel;
        $postagens->quartos = $request->quartos;
       
       
       
        

        //tranformando as imagens em base64
        $totalImages = count($request->images);
        $jsonImages = [];
        for($i = 0; $i < $totalImages; $i++){
            $content = $request->file("images");
            $image = file_get_contents($content[$i]);
            $image64 = base64_encode($image);
            $jsonImages[] = $image64;
        }

        $postagens->images = $jsonImages;
        $postagens->save();
        

        return redirect()->route('postagem.index')->with('mensagem', 'Postagem feita com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //Retorna a visuzalição (view) do elemento rote show 
       $postagens = Postagem::find($id);
       $comentarios = Comentario::all();
       return view('postagem.postagem_show', compact('postagens','comentarios','comentarios'));



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = Estado::all();
        $cidades = Cidade::all();
        $postagens = Postagem::find($id);
        $hotel = Hotel::find($id);

        return view('postagem.postagem_edit', compact('estados', 'cidades' , 'hotel','postagens'));
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

        $postagens = Postagem::find($id);
        $postagens->estado_id = $request->estado_id;
        $postagens->cidade_id = $request->cidade_id;
        $postagens->hotel = $request->hotel;
        $postagens->quartos = $request->quartos;

        // Obter imagens existentes (se houver)
        $currentImages = $postagens->images ?? [];

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
        $postagens->images = array_values($currentImages); // Reorganizar índices do array
        $postagens->save();


        return redirect()->route('postagem.index')->with('mensagem', 'Postagen editado com sucesso');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postagens = Postagem::find($id);
        $postagens -> delete();

        return redirect() -> route('postagem.index') -> with('mensagem', 'Postagem deletada com sucesso !');
    }
}
