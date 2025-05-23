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
        Schema::create('autocarros', function (Blueprint $table) {
            $table->id(); // Chave estrangeira para a tabela de linhas
            $table->decimal('latitude', 10, 7); // Coordenada de latitude
            $table->decimal('longitude', 10, 7); // Coordenada de longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autocarros');
    }
};
