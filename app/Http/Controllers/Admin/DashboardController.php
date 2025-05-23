<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index');
    }

    public function visaoGeral(): View
    {
        return view('admin.visao-geral-content'); // Crie esta view
    }

    public function usuarios(): View
    {
        return view('admin.usuarios-content'); // Crie esta view
    }

    public function produtos(): View
    {
        return view('admin.produtos-content'); // Crie esta view
    }

    public function relatorios(): View
    {
        return view('admin.relatorios-content'); // Crie esta view
    }
}