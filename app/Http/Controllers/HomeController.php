<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Linha;
use App\Models\Paragem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; // Certifique-se de importar a classe Controller

class HomeController extends Controller
{
    public function index() // Adapte o nome do método conforme o seu caso
    {
        $totalUtilizadoresAtivos = User::where('last_activity', '>', now()->subDays(30))->count();
        $totalUtilizadoresMesPassado = User::where('last_activity', '>', now()->subDays(60))->where('last_activity', '<=', now()->subDays(30))->count();
        $percentagemUtilizadoresAtivosMesPassado = ($totalUtilizadoresMesPassado > 0) ? (($totalUtilizadoresAtivos - $totalUtilizadoresMesPassado) / $totalUtilizadoresMesPassado) * 100 : 0;

        $totalLinhasRegistadas = Linha::count();
        $totalParagensRegistadas = Paragem::count();

         $mediaAvaliacoesLinhas = DB::table('linha_avaliacoes')->avg('pontuacao') ?? 0; 
        $totalLocalizacoesTempoReal = DB::table('localizacoes')->where('created_at', '>', now()->subDay())->count();

        return view('welcome', [
            'totalUtilizadoresAtivos' => $totalUtilizadoresAtivos,
            'percentagemUtilizadoresAtivosMesPassado' => $percentagemUtilizadoresAtivosMesPassado,
            'totalLinhasRegistadas' => $totalLinhasRegistadas,
            'totalParagensRegistadas' => $totalParagensRegistadas,
            'mediaAvaliacoesLinhas' => $mediaAvaliacoesLinhas,
            'totalLocalizacoesTempoReal' => $totalLocalizacoesTempoReal,
        ]);
    }
}