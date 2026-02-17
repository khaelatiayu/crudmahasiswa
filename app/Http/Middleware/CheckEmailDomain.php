<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEmailDomain
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user login dan emailnya berakhiran @ikmi.ac.id
        if (Auth::check() && str_ends_with(Auth::user()->email, '@ikmi.ac.id')) {
            return $next($request);
        }

        // Jika tidak, tampilkan error 403 (Forbidden)
        abort(403, 'Hanya user dengan email @ikmi.ac.id yang bisa mengakses halaman ini.');
    }
}