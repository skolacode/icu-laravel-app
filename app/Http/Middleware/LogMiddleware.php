<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        Log::info(
            'User ID:'. $user->id. 
            '| name: '.$user->name.
            ' acces to URL: '.
            $request->fullUrl()
        );

        return $next($request);
    }
}


// user > make a request > middleware > controller > response > user
// datadog > log > monitoring > alert > user