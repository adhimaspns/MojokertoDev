<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * ! Setiap Membuat Middleware Custom Selalu registrasikan Middlleware ke kernel.php
     */
    public function handle($request, Closure $next,...$roles)
    {
        //? Jika Field level sama dengan $role

        // ... ini mewakili lebih dari 1 array
        //user yang login role == admin
        // yang dikirim dari parameter web.php adalah superadmin
        // admin == ['superadmin'] 

        // Operator logika && | operator ini bisa dikatakan memenuhi kriteria ketika semua nilainya harus berniali true

        // $rokok = 'surya';

        // // Operasi OR
        // if ($rokok == 'surya' || $rokok == 'malboro') {
        //     # code...
        // }
        // // Operasi in_array() yg intinya sama seperti operasi &&
        // if (in_array($rokok, ['surya', 'malboro'])) {
        //     # code...
        // }

        if (in_array($request->user()->role,$roles)) {
            //** Lanjut ke proses selanjutnya 
            return $next($request);

            // return $roles;
        }

        abort(401);

    }
}
