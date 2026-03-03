<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user_role') || Session::get('user_role') !== 'admin') {
            abort(403, 'Unauthorized Access');
        }

        return $next($request);
    }
}
