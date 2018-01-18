<?php

namespace App\Http\Middleware;

use Closure;

class AdmEdit
{

  public function handle($request, Closure $next)
  {   if(auth()->check()){
      return $next($request);
  }else{
    return Redirect('/');
  }
  }
}
