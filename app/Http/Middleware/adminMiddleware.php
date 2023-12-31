<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth()->user()->role->name === 'admin') {
            return $next($request);
        }
        return redirect('/');
    }
}
