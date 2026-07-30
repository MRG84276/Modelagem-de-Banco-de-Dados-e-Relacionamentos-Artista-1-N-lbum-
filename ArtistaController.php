<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;

class ArtistaController extends Controller
{
    public function index()
    {
        $artistas = Artista::all();
        return view('artistas.index', compact('artistas'));
    }

    public function create()
    {
        return view('artistas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'pais_origem' => 'required|date',
        ]);

        Artista::create($validated);

        return redirect()->route('artistas.index')->with('success', 'Artista criado com sucesso!');
    }

    public function show(Artista $artista)
    {
        return view('artistas.show', compact('artista'));
    }

    public function edit(Artista $artista)
    {
        return view('artistas.edit', compact('artista'));
    }

    public function update(Request $request, Artista $artista)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'pais_origem' => 'required|date',
        ]);

        $artista->update($validated);
        return redirect()->route('artistas.index')->with('success', 'Artista atualizado com sucesso!');
    }

    public function destroy(Artista $artista)
    {
        $artista->delete();
        return redirect()->route('artists.index')->with('success', 'Artista excluído com sucesso!');
    }
}