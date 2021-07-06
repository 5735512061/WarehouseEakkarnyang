<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {dd($guard);
        switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.login');
              }
              break;

            case 'customer':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('customer.login');
              }
              break;

            default:
              if (Auth::guard($guard)->check()) {
                return redirect()->route('login');
              }
              break;
        }

        return $next($request);
    }
}
