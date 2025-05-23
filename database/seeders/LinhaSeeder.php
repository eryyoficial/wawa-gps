<?php

namespace Database\Seeders;

use App\Models\Linha;
use Illuminate\Database\Seeder;

class LinhaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Linha::create(['numero' => '1', 'destino' => 'Aeroporto']);
        Linha::create(['numero' => '5A', 'destino' => 'Estádio']);
        Linha::create(['numero' => '23', 'destino' => 'Mercado Central']);
    }
}