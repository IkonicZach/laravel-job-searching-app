<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->status === 'deactivated') {
            if ($request->user() && $request->user()->id === Auth::id()) {
                // Owner of the account
                return redirect()->route('reactivate_account'); // You can create a named route for reactivation
            } else {
                // Not the owner, show error page
                abort(403, 'This account is deactivated.');
            }
        }

        return $next($request);
    }
}
