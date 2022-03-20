<?php

namespace App\Http\Middleware;

use Closure;

class UsuarioAcceso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if (auth('usuario')->check()){
        return $next($request);
      }

      return redirect('/');
    }
}
