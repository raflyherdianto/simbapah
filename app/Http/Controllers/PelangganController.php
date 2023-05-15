<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pelanggan.index', [
            // 'title' => 'Data Barang',
            'pelanggans' => Pelanggan::all(),
            'totalPelanggan' => Pelanggan::all()->count(),
            'totalPerempuan' => Pelanggan::where('jenis_kelamin', 'Perempuan')->count(),
            'totalLaki' => Pelanggan::where('jenis_kelamin', 'Laki-laki')->count(),
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
        return view('dashboard.pelanggan.create', [
            // 'title' => 'Tambah Data Barang',
            // 'kategoris'=>Kategori::all(),
            // //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'ttl' => 'required|max:255',
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
            $validatedData['foto'] = $request->file('foto')->store('foto-pelanggan');
        }

        Pelanggan::create($validatedData);

        $pelanggan = Pelanggan::latest()->first();
        $pelanggan -> kode_user = 'PEL-'.$pelanggan->id;
        $pelanggan -> update();

        $validatedDatas = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedDatas['password'] = Hash::make($request->password);

        User::create($validatedDatas);

        $user = User::latest()->first();
        $user -> username = $request->username;
        $user -> pelanggan_id = $pelanggan->id;
        $user -> level = 'Pelanggan';
        $user -> update();

        return redirect('/dashboard/pelanggan')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.edit', [
            // 'title' => 'Edit Data Barang',
            'pelanggan'=>$pelanggan,
            'users'=>User::where('pelanggan_id', $pelanggan->id)->first(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules = [
            'nama' => 'required|max:255',
            'nik' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'ttl' => 'required|max:255',
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

        if ($request->kode_user != $pelanggan->kode_user) {
            $rules['kode_user'] = 'required|unique:pelanggans';
        }

        $validateData = $request->validate($rules);

        if ($request->file('foto')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('foto-pelanggan');
        }

        Pelanggan::where('id', $pelanggan->id)->update($validateData);

        $validatedData = [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        $validatedDatas = $request->validate($validatedData);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedData['password'] = Hash::make($request->password);

        User::where('pelanggan_id', $pelanggan->id)->update($validatedDatas);

        return redirect('/dashboard/pelanggan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        if ($pelanggan->foto) {
            Storage::delete($pelanggan->foto);
        }
        Pelanggan::destroy($pelanggan->id);
        User::where('pelanggan_id', $pelanggan->id)->delete();
        return redirect('/dashboard/pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
