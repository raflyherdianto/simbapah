<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Mitra;
use App\Models\Petugase;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function indexMitra()
    {
        return view('register.index-mitra', [
            // 'title' => 'Register',
            // 'active' => 'register'
        ]);
    }

    public function indexPetugas()
    {
        return view('register.index-petugas', [
            // 'title' => 'Register',
            // 'active' => 'register'
        ]);
    }
    public function indexPelanggan()
    {
        return view('register.index-pelanggan', [
            // 'title' => 'Register',
            // 'active' => 'register'
        ]);
    }

    public function indexAdmin()
    {
        return view('register.index-admin', [
            // 'title' => 'Register',
            // 'active' => 'register'
        ]);
    }

    public function storePelanggan(Request $request)
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

        return redirect('/login')->with('success', 'Anda berhasil melakukan registrasi!');
    }

    public function storePetugas(Request $request)
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

        $petugas = Petugase::latest()->first();
        $petugas -> kode_user = 'PTS-'.$petugas->id;
        $petugas -> update();

        $validatedDatas = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // $validatedDatas['password'] = bcrypt($validatedDatas['password']);
        $validatedDatas['password'] = Hash::make($request->password);

        User::create($validatedDatas);

        $user = User::latest()->first();
        $user -> username = $request->username;
        $user -> petugase_id = $petugas->id;
        $user -> level = 'Petugas';
        $user -> update();

        return redirect('/login')->with('success', 'Anda berhasil melakukan registrasi!');
    }

    public function storeMitra(Request $request)
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

        return redirect('/login')->with('success', 'Anda berhasil melakukan registrasi!');
    }

    public function storeAdmin(Request $request)
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

        return redirect('/login')->with('success', 'Anda berhasil melakukan registrasi!');
    }
}
