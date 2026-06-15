<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login dan apakah rolenya sesuai
        if (!auth()->check() || auth()->user()->role !== $role) {
            return response()->json(['message' => 'Forbidden - Tidak punya akses'], 403);
        }
        return $next($request);
    }
}