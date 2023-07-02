<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

class CheckLogin {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();

        if($user->role == $roles)
            return $next($request);

        return redirect('login')->with('error',"kamu gak punya akses");
    }
}
