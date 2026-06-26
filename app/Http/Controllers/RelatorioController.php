<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    // 📤 SAÍDAS
    public function saidas(Request $request)
    {
        $query = DB::table('saidas')
            ->join('produtos', 'saidas.produto_id', '=', 'produtos.id')
            ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            ->select(
                'produtos.nome',
                'categorias.nome as categoria',
                'saidas.setor',
                'saidas.quantidade',
                'saidas.created_at'
            );

        if ($request->data) {
            $query->whereDate('saidas.created_at', $request->data);
        }

        $saidas = $query->orderBy('saidas.created_at', 'desc')->get();

        return view('relatorios.saidas', compact('saidas'));
    }

    // 📥 ENTRADAS (PROTEGIDO contra erro de tabela inexistente)
    public function entradas(Request $request)
    {
        // 🔥 EVITA ERRO caso a tabela não exista ainda
        if (!DB::getSchemaBuilder()->hasTable('entradas')) {
            return view('relatorios.entradas', [
                'entradas' => collect()
            ]);
        }

        $query = DB::table('entradas')
            ->join('produtos', 'entradas.produto_id', '=', 'produtos.id')
            ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            ->select(
                'produtos.nome',
                'categorias.nome as categoria',
                'entradas.setor',
                'entradas.quantidade',
                'entradas.responsavel',
                'entradas.created_at'
            );

        if ($request->data) {
            $query->whereDate('entradas.created_at', $request->data);
        }

        $entradas = $query->orderBy('entradas.created_at', 'desc')->get();

        return view('relatorios.entradas', compact('entradas'));
    }

    // 📊 POR SETOR
    public function porSetor()
    {
        $dados = DB::table('saidas')
            ->join('produtos', 'saidas.produto_id', '=', 'produtos.id')
            ->select(
                'saidas.setor',
                DB::raw('SUM(saidas.quantidade) as total_saida')
            )
            ->groupBy('saidas.setor')
            ->get();

        return view('relatorios.por_setor', compact('dados'));
    }

    // 📦 POR CATEGORIA
    public function porCategoria()
    {
        $dados = DB::table('saidas')
            ->join('produtos', 'saidas.produto_id', '=', 'produtos.id')
            ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            ->select(
                'categorias.nome as categoria',
                DB::raw('SUM(saidas.quantidade) as total_saida')
            )
            ->groupBy('categorias.nome')
            ->get();

        return view('relatorios.por_categoria', compact('dados'));
    }
}