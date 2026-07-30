<?php

namespace App\Models;

use App\Models\Artista;
use App\Models\Musica;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;    

class Album extends Model
{ 
    protected $table = 'albuns';
    protected $fillable = [
        'nome',
        'artista_id',
        'ano_lancamento',
        'url_imagem',
    ];

    public function artista(): BelongsTo
    {
        return $this->belongsTo(Artista::class, 'artista_id');
    }

    public function musicas(): HasMany
    {
        return $this->hasMany(Musica::class, 'album_id');
    }
}
