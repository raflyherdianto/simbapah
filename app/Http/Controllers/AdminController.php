<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admins.index', [
            // 'title' => 'Data Barang',
            'admins' => Admin::all(),
            'totalAdmin' => Admin::all()->count(),
            'totalPerempuan' => Admin::where('jenis_kelamin', 'Perempuan')->count(),
            'totalLaki' => Admin::where('jenis_kelamin', 'Laki-laki')->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admins.create', [
            // 'title' => 'Tambah Data Barang',
            // 'kategoris'=>Kategori::all(),
            // //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
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
            $validatedData['foto'] = $request->file('foto')->store('foto-admin');
        }

        Admin::create($validatedData);

        $admin = Admin::latest()->first();
        $admin -> kode_user = 'ADM-'.$admin->id;
        $admin -> update();

        $validatedDatas = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedDatas['password'] = Hash::make($request->password);

        User::create($validatedDatas);

        $user = User::latest()->first();
        $user -> username = $request->username;
        $user -> admin_id = $admin->id;
        $user -> level = 'Admin';
        $user -> update();

        return redirect('/dashboard/admin')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit', [
            // 'title' => 'Edit Data Barang',
            'admin'=>$admin,
            'users'=>User::where('admin_id', $admin->id)->first(),
            //
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
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

        if ($request->kode_user != $admin->kode_user) {
            $rules['kode_user'] = 'required|unique:admins';
        }

        $validateData = $request->validate($rules);

        if ($request->file('foto')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('foto-admin');
        }

        Admin::where('id', $admin->id)->update($validateData);

        $validatedData = [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        $validatedDatas = $request->validate($validatedData);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedData['password'] = Hash::make($request->password);

        User::where('admin_id', $admin->id)->update($validatedDatas);

        return redirect('/dashboard/admin')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if ($admin->foto) {
            Storage::delete($admin->foto);
        }
        Admin::destroy($admin->id);
        User::where('admin_id', $admin->id)->delete();
        return redirect('/dashboard/admin')->with('success', 'Data berhasil dihapus');
    }
}
