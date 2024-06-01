<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.calon.index', ['collection' => Calon::with(['calonketua', 'calonwakilketua'])->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.calon.create', ['mahasiswa' => Mahasiswa::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('kotak_kosong')) {
            $data = $request->validate([
                'kotak_kosong' => 'accepted'
            ]);
        } else {
            $data = $request->validate([
                'gambar' => 'required|image',
                'ketua_id' => 'required|unique:calons,ketua_id|different:wakil_ketua_id',
                'wakil_ketua_id' => 'required|unique:calons,wakil_ketua_id|different:ketua_id',
                'visi' => 'required',
                'misi' => 'required',
            ]);

            $gambar = $request->file('gambar');
            $path = $gambar->store("public/images");
            $path = str_replace("public/images/", "", $path);

            $data['gambar'] = $path;
        }

        Calon::create($data);

        return back()->with('msg', 'Berhasil Buat Calon');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calon $calon)
    {
        return view('dashboard.calon.show', ['data' => $calon->where('id', $calon->id)->with(['calonketua', 'calonwakilketua'])->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calon $calon)
    {
        return view('dashboard.calon.edit', ['data' => $calon, 'mahasiswa' => Mahasiswa::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calon $calon)
    {
        $data = $request->validate([
            'ketua_id' => 'required|different:wakil_ketua_id',
            'wakil_ketua_id' => 'required|different:ketua_id',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = $gambar->store("public/images");
            $path = str_replace("public/images/", "", $path);

            $data['gambar'] = $path;
        }

        $calon->update($data);

        return redirect()->route('calon.index')->with('msg', 'Berhasil Ubah Calon');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calon $calon)
    {
        Storage::delete("public/images/$calon->gambar");
        $calon->delete();

        return redirect()->route('calon.index')->with('msg', 'Berhasil Hapus Calon');
    }
}
