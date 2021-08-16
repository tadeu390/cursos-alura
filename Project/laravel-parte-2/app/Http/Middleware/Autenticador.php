<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            !$request->is('entrar', 'registrar') &&//se o middleware for aplicado a todas rotas, aqui digo para redirecionar para a rota entrar, apenas se, a rota em questão é alguma das especificadas aqui
            !Auth::check()
        ) {
            return redirect()->route('entrar');
        }

        return $next($request);
    }
}
