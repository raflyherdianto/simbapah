<?php

namespace App\Http\Controllers;

use App\Models\Statuse;
use App\Models\Petugase;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $statuses = Statuse::where('pelanggan_id', auth()->user()->pelanggan->id)->get();
        // $statuses = Statuse::where('petugase_id', auth()->user()->petugase->id)->orWhere('petugase_id', null)->get();
        // dd($statuses);
        $statuses = Statuse::all();
        if(auth()->user()->level=='Petugas'){
            $statuses = Statuse::where('petugase_id', auth()->user()->petugase->id)->orWhere('petugase_id', null)->get();
        } else if(auth()->user()->level=='Pelanggan'){
            $statuses = Statuse::where('pelanggan_id', auth()->user()->pelanggan->id)->get();
        }

        return view('dashboard.status.index', [
            'statuse' => $statuses,
            'totalAll' => $statuses->count(),
            'totalKosong' => $statuses->where('status', 'Kosong')->count(),
            'totalPenuh' => $statuses->where('status', 'Penuh')->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.status.create', [
            'pelanggans'=>Pelanggan::all(),
            'petugase'=>Petugase::all(),
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Statuse::all());
        $validateData = $request->validate([
            'pelanggan_id'=>'required',
            'status'=>'required',
            'petugase_id'=>'required',
        ]);

        Statuse::create($validateData);
        return redirect('/dashboard/statuse')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statu  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Statuse $statuse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statu  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Statuse $statuse)
    {
        return view('dashboard.status.edit', [
            'statu'=>$statuse,
            'pelanggans'=>Pelanggan::all(),
            'petugase'=>Petugase::all(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusRequest  $request
     * @param  \App\Models\Statu  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statuse $statuse)
    {
        $rules = [
            'pelanggan_id'=>'required',
            'status'=>'required',
            'petugase_id'=>'required',
        ];

        $validateData = $request->validate($rules);

        Statuse::where('id', $statuse->id)->update($validateData);
        return redirect('/dashboard/statuse')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statu  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statuse $statuse)
    {
        Statuse::destroy($statuse->id);
        return redirect('/dashboard/statuse')->with('success', 'Data berhasil dihapus');
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStatus(Request $request)
    {
        // dd(Statuse::all());
        $validateData = $request->validate([
            'pelanggan_id'=>'required',
            'status'=>'required',
            // 'petuga_id'=>'required',
        ]);

        Statuse::create($validateData);
        return redirect('/dashboard/statuse')->with('success', 'Data berhasil ditambahkan');
    }
}
