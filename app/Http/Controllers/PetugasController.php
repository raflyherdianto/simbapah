<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use App\Models\Petugase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.petugas.index', [
            // 'title' => 'Data Barang',
            'petugases' => Petugase::all(),
            'totalPetugas' => Petugase::all()->count(),
            'totalPerempuan' => Petugase::where('jenis_kelamin', 'Perempuan')->count(),
            'totalLaki' => Petugase::where('jenis_kelamin', 'Laki-laki')->count(),
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
        return view('dashboard.petugas.create', [
            // 'title' => 'Tambah Data Barang',
            // 'kategoris'=>Kategori::all(),
            // //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetugasRequest  $request
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
            $validatedData['foto'] = $request->file('foto')->store('foto-petugas');
        }

        Petugase::create($validatedData);

        $petuga = Petugase::latest()->first();
        $petuga -> kode_user = 'PTS-'.$petuga->id;
        $petuga -> update();

        $validatedDatas = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedDatas['password'] = Hash::make($request->password);

        User::create($validatedDatas);

        $user = User::latest()->first();
        $user -> username = $request->username;
        $user -> petugase_id = $petuga->id;
        $user -> level = 'Petugas';
        $user -> update();

        return redirect('/dashboard/petugas')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugase $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugase $petuga)
    {
        // dd($petuga->id);
        return view('dashboard.petugas.edit', [
            // 'title' => 'Edit Data Barang',
            'petugase'=>$petuga,
            'users'=>User::where('petugase_id', $petuga->id)->first(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetugasRequest  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugase $petuga)
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

        if ($request->kode_user != $petuga->kode_user) {
            $rules['kode_user'] = 'required|unique:petugas';
        }

        $validateData = $request->validate($rules);

        if ($request->file('foto')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('foto-petugas');
        }

        Petugase::where('id', $petuga->id)->update($validateData);

        $validatedData = [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        $validatedDatas = $request->validate($validatedData);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedData['password'] = Hash::make($request->password);

        User::where('petugase_id', $petuga->id)->update($validatedDatas);

        return redirect('/dashboard/petugas')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugase $petuga)
    {
        if ($petuga->foto) {
            Storage::delete($petuga->foto);
        }
        Petugase::destroy($petuga->id);
        User::where('petugase_id', $petuga->id)->delete();
        return redirect('/dashboard/petugas')->with('success', 'Data berhasil dihapus');
    }
}
