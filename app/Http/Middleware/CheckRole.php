<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek sudah login belum
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silahkan login terlebih dahulu!');
        }

        // Cek role user
        if (!in_array(Auth::user()->role, $roles)) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses!');
        }

        return $next($request);
    }
}
