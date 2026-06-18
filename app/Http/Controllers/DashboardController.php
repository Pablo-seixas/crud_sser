<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = Produto::count();
        $totalQuantidade = Produto::sum('quantidade');
        $estoqueBaixo = Produto::whereColumn('quantidade', '<=', 'estoque_minimo')->count();

        return view('dashboard', compact('totalProdutos', 'totalQuantidade', 'estoqueBaixo'));
    }
}
