<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function index(Album $album)
    {

        $musicas = $album->musicas;
        return view("musicas.index", compact("album", "musicas"));
    }

    public function create(Album $album)
    {
        return view("musicas.create", compact("album"));
    }

    public function store(Request $request, Album $album)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'duration' => 'required|integer',
        ]);

        $album->musicas()->create($validated);

        return redirect()->route("albuns.musicas.index", $album)->with("success", "Música cadastrada com sucesso!");
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
        return redirect()->route("albuns.musicas.index", $musica->album_id)->with("success", "Música atualizada com sucesso!");
    }

    public function destroy(Musica $musica)
    {
        $albumId = $musica->album_id;
        $musica->delete();

        return redirect()->route("albuns.musicas.index", $albumId)->with("success", "Música excluída com sucesso!");
    }
}
