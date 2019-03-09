<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class BanPageAdmin
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
        $checkAdmin = User::where('id','=',Auth::id())->where('type','=','admin')->get();
        if(sizeof($checkAdmin)==1)
        {
            return redirect("/home");
        }
        return $next($request);
    }
}
