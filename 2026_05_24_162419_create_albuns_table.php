<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {  
        Schema::create('albuns', function (Blueprint $table) {
             $table->id();
             $table->string('nome');
             $table->foreignId('artista_id')->constrained('artistas')->cascadeOnDelete();
             $table->integer('ano_lancamento');
             $table->string('url_imagem');
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('albuns');
    }
};
