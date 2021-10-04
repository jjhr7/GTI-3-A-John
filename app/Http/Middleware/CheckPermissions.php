<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermissions
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

        if(auth()->user()->role->name == 'Super admin' || auth()->user()->role->name == 'Admin' || auth()->user()->role->name == 'Project Manager'){

            return $next($request);
        }else{
            abort(403, 'Unauthorized action');
        }
        abort(401, 'Unauthenticated');
    }
}
