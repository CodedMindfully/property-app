<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if admin is logged in using the admin guard
        if(!Auth::guard('admin')->check()){
            //if admin isn't logged in redirect to admin login page
            return redirect()->route('admin.login')
                            ->with('error', 'Please login to access this area.');
        }
        //If logged in let the next request through
        return $next($request);
    }
}
