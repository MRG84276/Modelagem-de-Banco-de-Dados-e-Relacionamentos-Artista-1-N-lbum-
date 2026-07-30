<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artista extends Model
{
    protected $table = 'artistas';

    protected $fillable = [
       'nome',
       'genero',
       'pais_origem',
       'url_imagem'

    ];

public function albuns(): HasMany
  {
    return $this->hasMany(Album::class, 'artista_id');
  }
  

}
