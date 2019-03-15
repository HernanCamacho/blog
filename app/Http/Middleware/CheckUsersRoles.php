<?php

namespace App\Http\Middleware;

use Closure;

class CheckUsersRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$roles = func_get_args(); // show an array with all parameters in this method
        //$roles = array_slice($roles, 2); // This method doesn't show the n (2 in this case) first parameters of the array
        $roles = array_slice(func_get_args(), 2);
        //dd($roles); //dumpanddie

        if(auth()->user()->hasRoles($roles)){
            return $next($request);
        }

        return redirect('/');

    }
}
