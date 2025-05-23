<?php

namespace App\Http\Controllers;

use App\Models\Linha;
use Illuminate\Http\Request;

class LinhaController extends Controller
{
    public function index()
    {
        $linhas = Linha::with('paragems')->get();
        return view('linhas.listar', compact('linhas'));
    }

    public function show(Linha $linha)
    {
        $linha->load('paragems'); // Garante que as paragems sejam carregadas
        return view('linhas.detalhes', compact('linha'));
    }
}