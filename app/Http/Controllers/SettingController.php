<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Pilihan;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.setting', ['pengaturan' => Pengaturan::first()]);
    }

    public function waktuPemilihan(Request $request)
    {
        $data = $request->validate([
            'buka_poling' => 'required|date',
            'tutup_poling' => 'required|date|after:buka_poling',
        ]);

        Pengaturan::find(1)->update($data);

        return back()->with('msg', 'Waktu Buka dan Tutup Poling Telah di Ubah');
    }

    public function resetPemilihan()
    {
        Pilihan::truncate();

        return back()->with('msg', 'Pemilihan Telah di Reset');
    }
}
