<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutocarroController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\LinhaController;
use App\Http\Controllers\ParagemController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gest', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/mapa', function () {
    return view('mapa');
})->name('mapa');

// Rotas para Linhas
Route::get('/linhas', [LinhaController::class, 'index'])->name('linhas.listar');
Route::get('/linhas/{linha}', [LinhaController::class, 'show'])->name('linhas.detalhes');

// Rotas para paragems
Route::get('/paragens', [ParagemController::class, 'index'])->name('paragems.listar');


// Rotas da API para os nossos dados
Route::get('/api/autocarros', [AutocarroController::class, 'index']);       // Listar todos os autocarros com sua localização
Route::get('/api/autocarros/{autocarro}', [AutocarroController::class, 'show']); // Detalhes de um autocarro específico (se necessário)
Route::get('/api/linhas', [AutocarroController::class, 'rotas']);         // Listar todas as linhas com suas paragems
Route::get('/api/linhas/{linha}', [AutocarroController::class, 'rota']);     // Detalhes de uma linha específica (se necessário)

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'editCustomer'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password/edit', [ProfileController::class, 'editPassword'])->name('profile.edit.password');
    Route::put('/profile/password', [NewPasswordController::class, 'store'])->name('profile.update.password');
});


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/visao-geral', [DashboardController::class, 'visaoGeral'])->name('dashboard.visao-geral');
    Route::get('/dashboard/usuarios', [DashboardController::class, 'usuarios'])->name('dashboard.usuarios');
    Route::get('/dashboard/produtos', [DashboardController::class, 'produtos'])->name('dashboard.produtos');
    Route::get('/dashboard/relatorios', [DashboardController::class, 'relatorios'])->name('dashboard.relatorios');


    // Adicione outras rotas de administração aqui
});

require __DIR__ . '/auth.php';
