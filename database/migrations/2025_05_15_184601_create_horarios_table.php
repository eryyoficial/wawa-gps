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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremento (BIGINT UNSIGNED por padrão)
            $table->foreignId('linha_id')->constrained('linhas')->onDelete('cascade'); // Chave estrangeira referenciando linhas.id
            $table->foreignId('paragem_id')->constrained('paragems')->onDelete('cascade'); // Chave estrangeira referenciando paragems.id
            $table->time('hora_partida');
            $table->string('dia_semana'); // Ex: 'Segunda', 'Terça', 'Sábado', 'Domingo'
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->unique(['linha_id', 'paragem_id', 'hora_partida', 'dia_semana'], 'horario_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
