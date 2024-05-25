<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Mahasiswa;
use App\Models\Pilihan;
use Faker\Factory;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $calon = Calon::withCount('pilihan')->get();
        $jumlah = array();

        foreach ($calon as $c) {
            if ($c->kotak_kosong == 1) {
                $data['label'] = 'Kotak Kosong';
            } else {
                $data['label'] = Mahasiswa::where('id', $c->ketua_id)->get()[0]->nama;
            }
            $data['data'] = $c->pilihan_count;
            $data['backgroundColor'] = Factory::create()->rgbCssColor();

            array_push($jumlah, $data);
        }

        return view('dashboard.index', [
            'mahasiswa' => Mahasiswa::all()->count(),
            'pemilih' => Pilihan::all()->count(),
            'jumlah' => $jumlah
        ]);
    }

    public function setting()
    {
        return view('dashboard.setting');
    }
}
