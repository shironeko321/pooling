<?php

namespace App\Http\Middleware;

use App\Models\Pengaturan;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WaktuPemilihan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pengaturan = Pengaturan::first();

        $now = Carbon::now();
        $buka = Carbon::parse($pengaturan->buka_poling);
        $tutup = Carbon::parse($pengaturan->tutup_poling);

        // jika waktu sekarang lebih dari buka dan kurang dari tutup
        if ($now->gt($buka) && $now->lt($tutup)) {
            return $next($request);
        }

        // jika kondisi diatas tidak terpenuhi dan mahasiswa telah login
        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('ayopilih.time');
    }
}
