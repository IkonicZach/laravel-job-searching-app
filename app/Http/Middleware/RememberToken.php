<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RememberToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasCookie('remember_token')) {
            $rememberToken = $request->cookie('remember_token');
            $user = User::where('remember_token', $rememberToken)->first();

            if ($user) {
                Auth::login($user);
            }

        }
        return $next($request);
    }
}
