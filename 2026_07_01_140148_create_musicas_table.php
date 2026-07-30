<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('artista');
            $table->integer('duration');
            /*Um artista pode ter muitos álbuns, mas um álbum específico pertence a apenas um artista. Por isso a tabela albuns recebe a chave estrangeira artista_id.*/
            $table->foreignId('album_id')->constrained('albuns')->cascadeOnDelete();
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('musicas');
    }
};
