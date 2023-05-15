<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Mitra;
use App\Models\Petugase;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function indexProfileAdmin()
    {
        return view('dashboard.profile.editAdmin', [
        ]);
    }
    public function indexProfilePetugas()
    {
        return view('dashboard.profile.editPetugas', [
        ]);
    }
    public function indexProfilePelanggan()
    {
        return view('dashboard.profile.editPelanggan', [
        ]);
    }
    public function indexProfileMitra()
    {
        return view('dashboard.profile.editMitra', [
        ]);
    }

    public function updateProfileAdmin(Request $request)
    {
        $admin = Admin::find(auth()->user()->id);
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

        return redirect('/dashboard/profile/admin')->with('success', 'Data berhasil diubah');
    }

    public function updateProfilePetugas(Request $request)
    {
        $petuga = Petugase::find(auth()->user()->id);
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
            $rules['kode_user'] = 'required|unique:petugases';
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

        return redirect('/dashboard/profile/petugas')->with('success', 'Data berhasil diubah');
    }

    public function updateProfilePelanggan(Request $request)
    {
        $pelanggan = Pelanggan::find(auth()->user()->id);
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

        return redirect('/dashboard/profile/pelanggan')->with('success', 'Data berhasil diubah');
    }

    public function updateProfileMitra(Request $request)
    {
        $mitra = Mitra::find(auth()->user()->id);
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

        return redirect('/dashboard/profile/mitra')->with('success', 'Data berhasil diubah');
    }

}
