<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function index()
    {
        return view('acesso');
    }

    public function entrar(Request $request)
    {
        if ($request->codigo === '151515') {
            session(['acesso_liberado' => true]);
            return redirect('/dashboard');
        }

        return back()->with('erro', 'Código inválido');
    }
}