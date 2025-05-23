<?php

namespace Database\Seeders;

use App\Models\Autocarro;
use App\Models\Linha;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AutocarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_AO'); // Define o locale para Angola para dados mais realistas (se disponível)

        // Autocarros para a Linha 1
        $linha1 = Linha::where('numero', '1')->first();
        if ($linha1) {
            for ($i = 0; $i < 3; $i++) {
                Autocarro::create([
                    'linha_id' => $linha1->id,
                    'latitude' => $faker->latitude(-8.86, -8.82), // Latitude dentro de uma pequena variação
                    'longitude' => $faker->longitude(13.22, 13.26), // Longitude dentro de uma pequena variação
                ]);
            }
        }

        // Autocarros para a Linha 5A
        $linha5A = Linha::where('numero', '5A')->first();
        if ($linha5A) {
            for ($i = 0; $i < 2; $i++) {
                Autocarro::create([
                    'linha_id' => $linha5A->id,
                    'latitude' => $faker->latitude(-8.84, -8.81),
                    'longitude' => $faker->longitude(13.24, 13.28),
                ]);
            }
        }

        // Autocarros para a Linha 23
        $linha23 = Linha::where('numero', '23')->first();
        if ($linha23) {
            for ($i = 0; $i < 4; $i++) {
                Autocarro::create([
                    'linha_id' => $linha23->id,
                    'latitude' => $faker->latitude(-8.82, -8.80),
                    'longitude' => $faker->longitude(13.20, 13.24),
                ]);
            }
        }
    }
}