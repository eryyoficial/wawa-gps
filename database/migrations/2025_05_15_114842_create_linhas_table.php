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
        Schema::create('linhas', function (Blueprint $table) {
                       $table->id();
            $table->string('numero')->unique(); // Número da linha (ex: 1, 5A, etc.) - deve ser único
            $table->string('destino');        // Destino final da linha
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linhas');
    }
};
