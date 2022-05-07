<?php

namespace App\Http\Middleware;
use Auth;
use DB;
use Closure;
use Illuminate\Http\Request;


class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        if(auth()->user()->role_id == 1){
            return $next($request);
        }elseif (auth()->user()->role_id == 2) {
            return redirect('/cashier');
        }elseif (auth()->user()->role_id == 3) {
            return redirect('/waiter');
        }elseif (auth()->user()->role_id == 4) {
            return redirect('/kitchen');
        }
        dd('admin middleware');
}
}