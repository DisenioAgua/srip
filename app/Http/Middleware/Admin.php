<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
  public function handle($request, Closure $next)
  {   if(auth()->check()){
      if(auth()->user()->acceso==1) {
        return $next($request);
      }else{
        return Redirect('/');
      }
  }else{
    return Redirect('/');
  }
  }
}
