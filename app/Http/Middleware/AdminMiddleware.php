<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/'); // Redirecționează utilizatorii obișnuiți către pagina principală sau altă pagină
    }
}
