<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    
    public function index(int $album_id)
    {
        $musicas = Musica::where('album_id', $album_id)->get();
        return view("musicas.index", compact("musicas", "album_id"));
    }

    
    public function create(int $album_id)
    {
        $album = Album::findOrFail($album_id);
        return view("musicas.create", compact("album"));
    }

   
    public function store(Request $request,int $album_id)
    {
       $album = Album::FindOrFail($album_id);   

       $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'duration' => 'required|integer',
        ]);

       $album->musicas()->create($validated);
    return redirect()->route("musicas.create", ['album_id' => $album_id])->with("success", "Música criada com sucesso");
    }

     
    public function show(Musica $musica)
    {
        return view("musicas.show", compact("musica"));
    }

  
    public function edit(Musica $musica)
    {
        return view("musicas.edit", compact("musica"));
    }

       public function update(Request $request, Musica $musica)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'duration' => 'required|integer'
        ]);
        $musica->update($validated);
        return redirect()->route("musicas.index")->with("success", "Música atualizada com sucesso");
    }

       public function destroy(Musica $musica)
    {
        $musica->delete();
        return redirect()->route("musicas.create")->with("success", "Música excluída com sucesso");
    }
}