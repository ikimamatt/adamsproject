<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika user belum login dan mencoba mengakses halaman admin
        if (!auth()->check() && $request->is('admin/*')) {
            return redirect('/login-dashboard-adb');
        }

        // Jika sudah login dan mencoba akses login page
        if (auth()->check() && $request->is('login')) {
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
