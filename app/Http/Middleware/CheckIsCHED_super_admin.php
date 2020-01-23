<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsCHED_super_admin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role === 4) {
            return $next($request);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}