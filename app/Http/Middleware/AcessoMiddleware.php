<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcessoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('acesso_liberado')) {
            return redirect('/')->with('erro', 'Digite o código de acesso');
        }

        return $next($request);
    }
}