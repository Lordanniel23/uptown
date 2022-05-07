<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cashierMiddleware
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
        if(auth()->user()->role_id == 1){
            return redirect('/admin');
        }elseif (auth()->user()->role_id == 2) {
            return $next($request);
        }elseif (auth()->user()->role_id == 3) {
            return redirect('/waiter');
        }elseif (auth()->user()->role_id == 4) {
            return redirect('/kitchen');
        }
        dd('cashier middleware');
        return redirect('login')->with('error',"You don't have admin access.");
    }
}
