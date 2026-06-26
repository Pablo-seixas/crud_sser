<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use App\Models\Produto;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function index()
    {
        $saidas = Saida::with('produto')->latest()->get();
        return view('saidas.index', compact('saidas'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('saidas.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'quantidade' => 'required|integer|min:1',
            'setor' => 'required',
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        if ($produto->quantidade < $request->quantidade) {
            return back()->with('error', 'Estoque insuficiente');
        }

        // baixa estoque
        $produto->quantidade -= $request->quantidade;
        $produto->save();

        // salva saída
        Saida::create([
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'setor' => $request->setor,
        ]);

        return redirect()->route('saidas.index')->with('success', 'Saída registrada com sucesso');
    }

    public function show(Saida $saida)
    {
        return $saida;
    }

    public function edit(Saida $saida)
    {
        $produtos = Produto::all();
        return view('saidas.edit', compact('saida', 'produtos'));
    }

    public function update(Request $request, Saida $saida)
    {
        $request->validate([
            'produto_id' => 'required',
            'quantidade' => 'required|integer|min:1',
            'setor' => 'required',
        ]);

        $saida->update($request->all());

        return redirect()->route('saidas.index')->with('success', 'Atualizado com sucesso');
    }

    public function destroy(Saida $saida)
    {
        $saida->delete();
        return back()->with('success', 'Removido com sucesso');
    }
}