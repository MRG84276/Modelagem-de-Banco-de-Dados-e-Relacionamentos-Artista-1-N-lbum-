<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Musica extends Model
{
    use HasFactory;

    protected $table = 'musicas';

    protected $fillable = [
       "nome",
       "artista",
       "album_id",
       "duration",
    ];

    public function album(): BelongsTo
    {
         return $this->belongsTo(Album::class);
    }
}
