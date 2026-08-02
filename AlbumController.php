<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function list()
    {
        
        $albuns = Album::all();
        return view('albuns.list', compact('albuns'));
    }

        public function create()
    {
    
        $album = Album::findOrFail($album_id);
        return view("albuns.create", compact("album"));
    }

    public function store(Request $request)
    {
        
       $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'artista_id' => 'required|exists:artistas,id',
        'ano_lancamento' => 'required|integer',
        'url_imagem' => 'nullable|url'
        ]);

        
        Album::create($validated);

        return redirect()->route('albuns.List')->with('sucesso', 'Álbum cadastrado com sucesso!');
    }

    public function Show(Album $album)
    {
        $album->load('musicas'); 
        return view('albuns.show', compact('album'));
    }


   
    public function Delete(Album $album)
    {
        
        $album->delete(); 
        return redirect()->route('albuns.list')->with('sucesso', 'Álbum e suas faixas foram excluídos!');
    }
}
