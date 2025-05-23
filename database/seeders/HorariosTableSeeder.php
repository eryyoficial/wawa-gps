<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Linha;
use App\Models\Paragem;
use App\Models\Horario;
use Carbon\Carbon;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obter todas as linhas e paragems
        $linhas = Linha::all();
        $paragems = Paragem::all();
        $diasSemana = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'];

        foreach ($linhas as $linha) {
            // Filtrar paragems desta linha
            $paragemsDaLinha = $paragems->where('linha_id', $linha->id);

            foreach ($paragemsDaLinha as $paragem) {
                // Criar alguns horários de exemplo para cada paragem em cada dia da semana
                foreach ($diasSemana as $dia) {
                    for ($i = 0; $i < 3; $i++) {
                        $hora = Carbon::createFromTime(rand(7, 19), rand(0, 59), 0)->format('H:i:s');
                        Horario::create([
                            'linha_id' => $linha->id,
                            'paragem_id' => $paragem->id,
                            'hora_partida' => $hora,
                            'dia_semana' => $dia,
                        ]);
                    }
                }
            }
        }
    }
}