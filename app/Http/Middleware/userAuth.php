<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->path()=="login" && $request->session()->has('user')){
            return redirect('/');
        }elseif($request->path()=="admin" && !$request->session()->has('admin')){
            return redirect('/');
        }
        return $next($request);
    }
}
