<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class waiterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
        if(auth()->user()->role_id == 1){
            return redirect('/admin');
        }elseif (auth()->user()->role_id == 2) {
            return redirect('/cashier');
        }elseif (auth()->user()->role_id == 3) {
            return $next($request);
        }elseif (auth()->user()->role_id == 4) {
            return redirect('/kitchen');
        }
        dd('waiter middleware');
        return redirect('home')->with('error',"You don't have admin access.");
    }
}
}
