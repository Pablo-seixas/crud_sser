<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\RelatorioPainelController;
use App\Http\Controllers\SaidaController;

/*
|--------------------------------------------------------------------------
| TELA DE ACESSO (PRIMEIRA TELA)
|--------------------------------------------------------------------------
*/
Route::get('/', [AcessoController::class, 'index']);
Route::post('/acesso', [AcessoController::class, 'entrar']);

/*
|--------------------------------------------------------------------------
| SISTEMA PROTEGIDO
|--------------------------------------------------------------------------
*/
Route::middleware(['acesso'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUTOS
    |--------------------------------------------------------------------------
    */
    Route::resource('produtos', ProdutoController::class);

    /*
    |--------------------------------------------------------------------------
    | SAÍDAS
    |--------------------------------------------------------------------------
    */
    Route::resource('saidas', SaidaController::class);

    Route::post('/produtos/{produto}/saida', [SaidaController::class, 'storeFromProduto'])
        ->name('produtos.saida');

    /*
    |--------------------------------------------------------------------------
    | RELATÓRIOS
    |--------------------------------------------------------------------------
    */

    // 📊 PAINEL PRINCIPAL
    Route::get('/relatorio', [RelatorioPainelController::class, 'index'])
        ->name('relatorio.index');

    // 📤 RELATÓRIO DE SAÍDAS
    Route::get('/relatorio/saidas', [RelatorioController::class, 'saidas'])
        ->name('relatorio.saidas');

    // 📥 RESERVADO FUTURO - ENTRADAS
    Route::get('/relatorio/entradas', [RelatorioController::class, 'entradas'])
        ->name('relatorio.entradas');
});