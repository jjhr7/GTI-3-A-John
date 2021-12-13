<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckManageTown
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

        $PermisionsUser = auth()->user()->information->role->permissions;

        dd($PermisionsUser);

        $permisoDenegado = true;

        foreach ($PermisionsUser as $permission){
            if($permission->name == 'Manage town'){
                $permisoDenegado = false;
            }
        }

        if($permisoDenegado){
            abort(403, 'Unauthorized action');
        }else{
            return $next($request);
        }
    }
}
