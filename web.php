<?php

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\ArtistaController;


Route::get('/', function (Request $request) {
    return view('welcome');
});

Route::get('/easter-egg', function (Request $request) {
    Log::info("Alquem encountrou o segredo!");
    return view('welcome');
});

Route::post('/create-test-album', function () {
    $album = Album::create([
        'nome' => 'Abbey Road',
        'artista' => 'The Beatles',
        'ano_lancamento' => 1969,
        'url_imagem' => 'https://link-da-imagem-ficticia.com/capa.jpg'
    ]);
    
    return response()->json([
          'message' => 'Álbum de teste criado com sucesso',
          'dados' => $album
    ], 201);
});

Route::get('/albuns', function() {
    $albuns = Album::all();
    return response()->json($albuns);
});

Route::get('/', function () {
     return redirect()->route('albuns.index');
});

Route::resource('artistas', ArtistaController::class);
Route::resource('albuns', AlbumController::class);
Route::resource('albuns.musicas', MusicaController::class);

Route::get('/musicas/{album_id}', [MusicaController::class, 'index'])->name('musicas.index');
Route::get('/musicas/create/{album_id}', [MusicaController::class, 'create'])->name('musicas.create');
Route::post('/musicas/{album_id}', [MusicaController::class, 'store'])->name('musicas.store');
Route::get('/musicas/detalhes/{album_id}', [MusicaController::class, 'show'])->name('musicas.show');
Route::get('/musicas/editar/{album_id}', [MusicaController::class, 'edit'])->name('musicas.edit');
Route::put('/musicas/atualizar/{album_id}', [MusicaController::class, 'update'])->name('musicas.update');
Route::delete('/musicas/deletar/{album_id}', [MusicaController::class, 'destroy'])->name('musicas.destroy');