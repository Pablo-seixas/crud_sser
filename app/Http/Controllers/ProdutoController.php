<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->get('busca');

        $produtos = Produto::with('categoria');

        if (!empty($busca)) {
            $produtos->where(function ($query) use ($busca) {
                $query->where('nome', 'like', "%{$busca}%")
                      ->orWhere('codigo', 'like', "%{$busca}%");
            });
        }

        $produtos = $produtos->latest()->get();

        return view('produtos.index', compact('produtos', 'busca'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required|min:3',
            'codigo' => 'required|unique:produtos',
            'quantidade' => 'required|integer|min:0',
            'estoque_minimo' => 'required|integer|min:0',
            'localizacao' => 'nullable',
            'observacoes' => 'nullable',
        ]);

        Produto::create($dados);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso.');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required|min:3',
            'codigo' => 'required|unique:produtos,codigo,' . $produto->id,
            'quantidade' => 'required|integer|min:0',
            'estoque_minimo' => 'required|integer|min:0',
            'localizacao' => 'nullable',
            'observacoes' => 'nullable',
        ]);

        $produto->update($dados);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto removido com sucesso.');
    }
}