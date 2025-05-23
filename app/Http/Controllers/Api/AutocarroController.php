<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autocarro;
use Illuminate\Http\JsonResponse;
Use App\Models\Linha;


class AutocarroController extends Controller
{
    public function index(): JsonResponse
    {
        $autocarros = Autocarro::with('linha')->get(['id', 'linha_id', 'latitude', 'longitude']);
        return response()->json($autocarros);
    }

    public function show(Autocarro $autocarro): JsonResponse
    {
        return response()->json($autocarro);
    }

    public function rotas(): JsonResponse
    {
        $linhas = Linha::with('paragems')->get();
        return response()->json($linhas);
    }

    public function rota(Linha $linha): JsonResponse
    {
        $linha->load('paragems'); // Carrega as paragems da linha específica
        return response()->json($linha);
    }
}
