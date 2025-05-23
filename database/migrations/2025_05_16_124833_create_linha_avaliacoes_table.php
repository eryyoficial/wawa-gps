<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('linha_avaliacoes', function (Blueprint $table) {
             $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuário que fez a avaliação
            $table->foreignId('linha_id')->constrained()->onDelete('cascade'); // Linha avaliada
            $table->integer('pontuacao'); // Pontuação da avaliação (ex: 1 a 5)
            $table->timestamps();

            $table->unique(['user_id', 'linha_id']); // Um usuário só pode avaliar uma linha uma vez
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linha_avaliacoes');
    }
};
