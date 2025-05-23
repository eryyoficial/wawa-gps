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
        Schema::create('paragems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('linha_id')->constrained()->onDelete('cascade'); // Chave estrangeira para a tabela de linhas
            $table->string('nome');          // Nome da paragem
            $table->decimal('latitude', 10, 7); // Coordenada de latitude da paragem
            $table->decimal('longitude', 10, 7); // Coordenada de longitude da paragem
            $table->integer('ordem');         // Ordem da paragem na linha
            $table->timestamps();
            $table->unique(['linha_id', 'ordem']); // Garante que a ordem seja única por linha
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paragems');
    }
};
