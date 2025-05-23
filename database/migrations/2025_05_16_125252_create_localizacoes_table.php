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
        Schema::create('localizacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('linha_id')->constrained()->onDelete('cascade'); // ID da linha do autocarro
            $table->decimal('latitude', 10, 7); // Latitude da localização
            $table->decimal('longitude', 10, 7); // Longitude da localização
            $table->timestamp('created_at')->useCurrent(); // Timestamp da localização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacoes');
    }
};
