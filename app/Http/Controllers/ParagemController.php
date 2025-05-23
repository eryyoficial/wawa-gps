<?php

namespace App\Http\Controllers;

use App\Models\Paragem;
use Illuminate\Http\Request;

class ParagemController extends Controller
{
    public function index()
    {
        $paragems = Paragem::with('linha')->get();
        return view('paragens.listar', compact('paragems'));
    }
}