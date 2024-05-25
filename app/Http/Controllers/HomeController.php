<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Mahasiswa;
use App\Models\Pengaturan;
use App\Models\Pilihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // home
    public function waktuPemilihan()
    {
        $pengaturan = Pengaturan::first();

        $now = Carbon::now();
        $buka = Carbon::parse($pengaturan->buka_poling);
        $tutup = Carbon::parse($pengaturan->tutup_poling);

        // jika waktu sekarang lebih dari buka dan kurang dari tutup
        if ($now->lt($buka)) {
            $data['msg'] = "Pemilihan Belum dimulai";
            $data['time'] = $buka;
        } elseif ($now->gt($tutup)) {
            $data['msg'] = "Pemilihan Sudah Selesai";
            $data['time'] = $tutup;
        }

        return view('home.waktupemilihan')->with($data);
    }

    public function ayopilih()
    {
        return view('home.pilih', [
            'collection' => Calon::with('calonketua', 'calonwakilketua')->get()
        ]);
    }

    public function detail(Calon $calon)
    {
        return view('home.detail', [
            'data' => $calon->where('id', $calon->id)->with(['calonketua', 'calonwakilketua'])->first()
        ]);
    }

    public function pilih(Request $request)
    {
        $data = $request->validate([
            'pilihan' => 'required|numeric|exists:calons,id'
        ]);

        $mahasiswa_id = Auth::guard('mahasiswa')->user()->id;
        $check = Pilihan::where('mahasiswa_id', $mahasiswa_id)->get();

        // cek sudah pilih atau belum
        if (count($check) == 0) {
            Pilihan::create([
                'mahasiswa_id' => $mahasiswa_id,
                'calon_id' => $data['pilihan']
            ]);

            return redirect()->route('ayopilih')->with('msg', 'Terima kasih anda sudah berpartisipasi dalam pemilihan kali ini');
        }

        return redirect()->route('ayopilih')->with('msg', 'Anda sudah pernah berpartisipasi dalam pemilihan kali ini');
    }


    // login mahasiswa
    public function login()
    {
        if (Auth::guard('mahasiswa')->check()) {
            return redirect()->route('ayopilih');
        }

        return view('home.login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string|exists:mahasiswas,nim',
        ]);

        $user = Mahasiswa::where('nim', $data['nim'])->first();

        Auth::guard('mahasiswa')->loginUsingId($user->id);
        $request->session()->regenerate();

        return redirect()->route('ayopilih');
    }

    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ayopilih.login');
    }
}
