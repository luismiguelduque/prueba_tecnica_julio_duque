<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerified
{
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()->email_verified_at){
             return redirect('/verificacion');
        }else{
            return $next($request);
        }
    }
}