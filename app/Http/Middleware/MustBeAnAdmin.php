<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAnAdmin
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
        
       if($request->user()&&$request->user()->isAdmin()){
          return $next($request);
        }
        abort(403,'没有权限');
        
        //return $next($request);
    }
}
