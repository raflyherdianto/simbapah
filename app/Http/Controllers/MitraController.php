<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMitraRequest;
use App\Http\Requests\UpdateMitraRequest;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mitra.index', [
            // 'title' => 'Data Barang',
            'mitras' => Mitra::all(),
            'totalMitra' => Mitra::all()->count(),
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
        return view('dashboard.mitra.create', [
            // 'title' => 'Tambah Data Barang',
            // 'kategoris'=>Kategori::all(),
            // //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMitraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nomor_usaha' => 'required|max:255',
            'alamat' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'kota' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kelurahan' => 'required|max:255',
            'kode_pos' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'foto'=>'image|file|max:2048',
        ]);

        if ($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('foto-mitra');
        }

        Mitra::create($validatedData);

        $mitra = Mitra::latest()->first();
        $mitra -> kode_user = 'MTR-'.$mitra->id;
        $mitra -> update();

        $validatedDatas = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedDatas['password'] = Hash::make($request->password);

        User::create($validatedDatas);

        $user = User::latest()->first();
        $user -> username = $request->username;
        $user -> mitra_id = $mitra->id;
        $user -> level = 'Mitra';
        $user -> update();

        return redirect('/dashboard/mitra')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        return view('dashboard.mitra.edit', [
            // 'title' => 'Edit Data Barang',
            'mitra'=>$mitra,
            'users'=>User::where('mitra_id', $mitra->id)->first(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMitraRequest  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mitra $mitra)
    {
        $rules = [
            'nama' => 'required|max:255',
            'nomor_usaha' => 'required|max:255',
            'alamat' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'kota' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kelurahan' => 'required|max:255',
            'kode_pos' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'foto'=>'image|file|max:2048',
        ];

        if ($request->kode_user != $mitra->kode_user) {
            $rules['kode_user'] = 'required|unique:mitras';
        }

        $validateData = $request->validate($rules);

        if ($request->file('foto')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('foto-mitra');
        }

        Mitra::where('id', $mitra->id)->update($validateData);

        $validatedData = [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        $validatedDatas = $request->validate($validatedData);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedData['password'] = Hash::make($request->password);

        User::where('mitra_id', $mitra->id)->update($validatedDatas);

        return redirect('/dashboard/mitra')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        if ($mitra->foto) {
            Storage::delete($mitra->foto);
        }
        Mitra::destroy($mitra->id);
        User::where('mitra_id', $mitra->id)->delete();
        return redirect('/dashboard/mitra')->with('success', 'Data berhasil dihapus');
    }
}
