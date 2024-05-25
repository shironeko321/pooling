<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mahasiswa.index', ['collection' => Mahasiswa::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|unique:mahasiswas,nim',
            'jurusan' => 'required'
        ]);

        Mahasiswa::create($data);

        return back()->with('msg', 'Berhasil Buat Mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.edit', ['data' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => "required|unique:mahasiswas,nim,$mahasiswa->id",
            'jurusan' => "required",
        ]);

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('msg', 'Berhasil Ubah Mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('msg', 'Berhasil Hapus Mahasiswa');
    }
}
