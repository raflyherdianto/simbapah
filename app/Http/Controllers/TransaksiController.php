<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        if(auth()->user()->level=='Pelanggan'){
            $transaksis = TransaksiDetail::where('stok_id', auth()->user()->stok->pelanggan->id)->get();
        } else if (auth()->user()->level=='Mitra'){
            $transaksis = Transaksi::where('mitra_id', auth()->user()->mitra->id)->get();
        }
        return view('dashboard.transaksi.index', [
            'transaksis' => $transaksis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transaksi.create', [
            'stoks'=>Stok::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mitra_id' => 'required|max:255',
        ]);

        Transaksi::create($validatedData);

        $transaksi = Transaksi::latest()->first();
        $transaksi -> kode_transaksi = 'TRANS-'.$transaksi->id;
        $transaksi -> status = 'Belum Dibayar';
        $transaksi -> update();

        $validatedDatas = $request->validate([
            'stok_id' => 'required|max:255',
        ]);

        $validatedDatas['berat_kg'] = Stok::find($validatedDatas['stok_id'])->berat_kg;
        $validatedDatas['total_harga'] = Stok::find($validatedDatas['stok_id'])->total_harga;
        $validatedDatas['harga_satuan_sampah'] = Stok::find($validatedDatas['stok_id'])->jenis_sampah->harga_satuan;
        TransaksiDetail::create($validatedDatas);

        $validateData = TransaksiDetail::latest()->first();
        $validateData -> transaksi_id = $transaksi->id;
        $validateData -> update();

        $transaksis = Transaksi::where('mitra_id', auth()->user()->mitra->id)->first();
        $transaksis['total_harga'] = TransaksiDetail::where('transaksi_id', $transaksis->id)->sum('total_harga');
        $transaksis -> update();

        return redirect('/dashboard/transaksi')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('dashboard.transaksi.edit', [
            'transaksis'=>$transaksi,
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $stok = Stok::all();
        $rules = [
            'mitra_id'=>'required',
            'kode_transaksi'=>'required',
            'status'=>'required',
            'total_harga'=>'required',
        ];
        $validateData = $request->validate($rules);
        Transaksi::where('id', $transaksi->id)->update($validateData);
        return redirect('/dashboard/transaksi')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);
        TransaksiDetail::where('transaksi_id', $transaksi->id)->delete();
        return redirect('/dashboard/transaksi')->with('success', 'Data berhasil dihapus');
    }

    public function showDetail(Transaksi $transaksi){
        // dd(TransaksiDetail::all());
        return view('dashboard.transaksi.details', [
            'transaksidetails' => TransaksiDetail::where('transaksi_id', $transaksi->id)->first(),
            //
        ]);
    }
}
