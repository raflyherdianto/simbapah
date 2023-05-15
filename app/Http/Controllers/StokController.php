<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Pelanggan;
use App\Models\JenisSampah;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stoks = Stok::all();
        if(auth()->user()->level=='Pelanggan'){
            $stoks = Stok::where('pelanggan_id', auth()->user()->pelanggan->id)->get();
        } else if (auth()->user()->level=='Mitra'){
            $stoks = Stok::where('status', 'Tersedia')->get();
        }
        return view('dashboard.stok.index', [
            'stoks' => $stoks,
            'totalStok' => $stoks->count(),
            'totalTrd' => $stoks->where('status', 'Tersedia')->count(),
            'totalTdk' => $stoks->where('status', 'Terjual')->count(),
            'totalKg' => $stoks->where('status', 'Tersedia')->sum('berat_kg'),
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stok.create', [
            'jenises'=>JenisSampah::all(),
            'pelanggans'=>Pelanggan::all(),
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pelanggan_id'=>'required',
            'jenis_sampah_id'=>'required',
            'jumlah_sampah'=>'required',
            'berat_kg'=>'required',
            'status'=>'required',
        ]);

        $validateData['total_satuan'] = $validateData['jumlah_sampah'] * $validateData['berat_kg'];
        $validateData['harga_kg'] = JenisSampah::find($validateData['jenis_sampah_id'])->harga_satuan * $validateData['berat_kg'];
        $validateData['total_harga'] = $validateData['harga_kg'] * $validateData['berat_kg'];

        Stok::create($validateData);
        return redirect('/dashboard/stok')->with('success', 'Data berhasil ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        return view('dashboard.stok.edit', [
            'stok'=>$stok,
            'jenises'=>JenisSampah::all(),
            'pelanggans'=>Pelanggan::all(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStokRequest  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok $stok)
    {
        $rules = [
            'pelanggan_id'=>'required',
            'jenis_sampah_id'=>'required',
            'jumlah_sampah'=>'required',
            'berat_kg'=>'required',
            'status'=>'required',
        ];

        $validateData = $request->validate($rules);
        $validateData['total_satuan'] = $validateData['jumlah_sampah'] * $validateData['berat_kg'];
        $validateData['harga_kg'] = JenisSampah::find($validateData['jenis_sampah_id'])->harga_satuan * $validateData['berat_kg'];
        $validateData['total_harga'] = $validateData['harga_kg'] * $validateData['berat_kg'];

        Stok::where('id', $stok->id)->update($validateData);
        return redirect('/dashboard/stok')->with('success', 'Data berhasil diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        Stok::destroy($stok->id);
        return redirect('/dashboard/stok')->with('success', 'Data berhasil dihapus');
        //
    }
}
