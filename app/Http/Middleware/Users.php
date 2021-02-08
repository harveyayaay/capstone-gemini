<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next, $user)
  {
    if(Auth::user()->position === "Manager")
    {
      return $next($request);
    }
    else if(Auth::user()->position === "Supervisor")
    {
      return $next($request);
    }
    else if(Auth::user()->position === "Frontliner")
    {
      return $next($request);
    }
      // return abort(403, 'Unauthorized');
      dd(Auth::user()->position);
  }
}