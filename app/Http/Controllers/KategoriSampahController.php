<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSampah;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKategoriSampahRequest;
use App\Http\Requests\UpdateKategoriSampahRequest;

class KategoriSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sampah.kategori.index', [
            'kategoris' => KategoriSampah::all(),
            'totalKategori' => KategoriSampah::all()->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sampah.kategori.create', [
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriSampahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required|max:255',
            'gambar'=>'image|file|max:2048',
        ]);

        if ($request->file('gambar')){
            $validateData['gambar'] = $request->file('gambar')->store('gambar-kategoriSampah');
        }

        KategoriSampah::create($validateData);
        return redirect('/dashboard/sampah/kategori')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriSampah  $kategoriSampah
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriSampah $kategoriSampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriSampah  $kategoriSampah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriSampah=KategoriSampah::find($id);
        return view('dashboard.sampah.kategori.edit', [
            'kategori'=>$kategoriSampah,
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriSampahRequest  $request
     * @param  \App\Models\KategoriSampah  $kategoriSampah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategoriSampah=KategoriSampah::find($id);

        $rules = [
            'nama' => 'required|max:255',
            'gambar'=>'image|file|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('gambar')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('gambar-kategoriSampah');
        }

        KategoriSampah::where('id', $kategoriSampah->id)->update($validateData);

        return redirect('/dashboard/sampah/kategori')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriSampah  $kategoriSampah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriSampah=KategoriSampah::find($id);
        if ($kategoriSampah->gambar) {
            Storage::delete($kategoriSampah->gambar);
        }
        KategoriSampah::destroy($kategoriSampah->id);
        return redirect('/dashboard/sampah/kategori')->with('success', 'Data berhasil dihapus');
    }
}
