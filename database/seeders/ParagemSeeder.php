<?php

namespace Database\Seeders;

use App\Models\Linha;
use App\Models\Paragem;
use Illuminate\Database\Seeder;

class ParagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // paragems para a Linha 1 (Aeroporto)
        $linha1 = Linha::where('numero', '1')->first();
        if ($linha1) {
            Paragem::create(['linha_id' => $linha1->id, 'nome' => 'Paragem A1', 'latitude' => -8.8383, 'longitude' => 13.2345, 'ordem' => 1]);
            Paragem::create(['linha_id' => $linha1->id, 'nome' => 'Paragem B1', 'latitude' => -8.8456, 'longitude' => 13.2412, 'ordem' => 2]);
            Paragem::create(['linha_id' => $linha1->id, 'nome' => 'Aeroporto', 'latitude' => -8.8521, 'longitude' => 13.2489, 'ordem' => 3]);
        }

        // paragems para a Linha 5A (Estádio)
        $linha5A = Linha::where('numero', '5A')->first();
        if ($linha5A) {
            Paragem::create(['linha_id' => $linha5A->id, 'nome' => 'Paragem C5A', 'latitude' => -8.8211, 'longitude' => 13.2555, 'ordem' => 1]);
            Paragem::create(['linha_id' => $linha5A->id, 'nome' => 'Paragem D5A', 'latitude' => -8.8288, 'longitude' => 13.2622, 'ordem' => 2]);
            Paragem::create(['linha_id' => $linha5A->id, 'nome' => 'Estádio', 'latitude' => -8.8355, 'longitude' => 13.2689, 'ordem' => 3]);
        }

        // paragems para a Linha 23 (Mercado Central)
        $linha23 = Linha::where('numero', '23')->first();
        if ($linha23) {
            Paragem::create(['linha_id' => $linha23->id, 'nome' => 'Paragem E23', 'latitude' => -8.8100, 'longitude' => 13.2200, 'ordem' => 1]);
            Paragem::create(['linha_id' => $linha23->id, 'nome' => 'Mercado Central', 'latitude' => -8.8150, 'longitude' => 13.2250, 'ordem' => 2]);
        }
    }
}