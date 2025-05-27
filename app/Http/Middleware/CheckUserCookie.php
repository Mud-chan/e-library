<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserCookie
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasCookie('user_id')) {
            return redirect('/logreg'); // arahkan jika cookie tidak ada
        }

        return $next($request);
    }
    
}
