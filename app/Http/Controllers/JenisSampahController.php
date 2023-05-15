<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use App\Models\KategoriSampah;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreJenisSampahRequest;
use App\Http\Requests\UpdateJenisSampahRequest;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sampah.jenis.index', [
            'jenises' => JenisSampah::all(),
            'kategoris'=>KategoriSampah::all(),
            'totalSampah' => JenisSampah::all()->count(),
            'totalOrganik'=> JenisSampah::where('kategori_sampah_id', 1)->count(),
            'totalAnorganik'=> JenisSampah::where('kategori_sampah_id', 2)->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sampah.jenis.create', [
            'kategoris'=>KategoriSampah::all(),
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenisSampahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required|max:255',
            'kategori_sampah_id'=>'required',
            'harga_satuan'=>'required',
            'gambar'=>'image|file|max:2048',
        ]);

        if ($request->file('gambar')){
            $validateData['gambar'] = $request->file('gambar')->store('gambar-jenisSampah');
        }

        JenisSampah::create($validateData);
        return redirect('/dashboard/sampah/jenis')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisSampah  $jenisSampah
     * @return \Illuminate\Http\Response
     */
    public function show(JenisSampah $jenisSampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisSampah  $jenisSampah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisSampah=JenisSampah::find($id);
        return view('dashboard.sampah.jenis.edit', [
            'jenis'=>$jenisSampah,
            'kategoris'=>KategoriSampah::all(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisSampahRequest  $request
     * @param  \App\Models\JenisSampah  $jenisSampah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenisSampah=JenisSampah::find($id);
        $rules = [
            'nama' => 'required|max:255',
            'kategori_sampah_id' => 'required',
            'harga_satuan' => 'required',
            'gambar'=>'image|file|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('gambar')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('gambar-jenisSampah');
        }

        JenisSampah::where('id', $jenisSampah->id)->update($validateData);
        return redirect('/dashboard/sampah/jenis')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisSampah  $jenisSampah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisSampah=JenisSampah::find($id);
        if ($jenisSampah->gambar) {
            Storage::delete($jenisSampah->gambar);
        }
        JenisSampah::destroy($jenisSampah->id);
        return redirect('/dashboard/sampah/jenis')->with('success', 'Data berhasil dihapus');
    }
}
