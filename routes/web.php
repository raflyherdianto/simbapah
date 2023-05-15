<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriSampahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::put('/dashboard/profile/mitra', [ProfileController::class, 'updateProfileMitra'])->middleware('auth');

Route::get('/dashboard/profile/mitra', [ProfileController::class, 'indexProfileMitra'])->middleware('auth');

Route::put('/dashboard/profile/petugas', [ProfileController::class, 'updateProfilePetugas'])->middleware('auth');

Route::get('/dashboard/profile/petugas', [ProfileController::class, 'indexProfilePetugas'])->middleware('auth');

Route::put('/dashboard/profile/pelanggan', [ProfileController::class, 'updateProfilePelanggan'])->middleware('auth');

Route::get('/dashboard/profile/pelanggan', [ProfileController::class, 'indexProfilePelanggan'])->middleware('auth');

Route::put('/dashboard/profile/admin', [ProfileController::class, 'updateProfileAdmin'])->middleware('auth');

Route::get('/dashboard/profile/admin', [ProfileController::class, 'indexProfileAdmin'])->middleware('auth');

Route::get('/dashboard/transaksi/detail/{transaksi}', [TransaksiController::class, 'showDetail'])->middleware('auth');

Route::resource('/dashboard/transaksi', TransaksiController::class)->middleware('auth');

Route::resource('/dashboard/stok', StokController::class)->middleware('auth');

Route::post('/dashboard/statuse/pelanggan', [StatusController::class, 'storeStatus'])->middleware('auth');

Route::resource('/dashboard/statuse', StatusController::class)->middleware('auth');

Route::resource('/dashboard/sampah/jenis', JenisSampahController::class)->middleware('auth');

Route::resource('/dashboard/sampah/kategori', KategoriSampahController::class)->middleware('auth');

Route::resource('/dashboard/mitra', MitraController::class)->middleware('admin');

Route::resource('/dashboard/pelanggan', PelangganController::class)->middleware('admin');

Route::resource('/dashboard/petugas', PetugasController::class)->middleware('admin');

Route::resource('/dashboard/admin', AdminController::class)->middleware('admin');

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        // dd(auth()->user()->petugas),
        // 'title' => 'Dashboard',
    ]);
})->middleware('auth');

Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register-admin',[RegisterController::class,'storeAdmin']);

Route::get('/register-admin', [RegisterController::class,'indexAdmin']);

Route::post('/register-mitra',[RegisterController::class,'storeMitra']);

Route::get('/register-mitra', [RegisterController::class,'indexMitra']);

Route::post('/register-petugas',[RegisterController::class,'storePetugas']);

Route::get('/register-petugas', [RegisterController::class,'indexPetugas']);

Route::post('/register-pelanggan',[RegisterController::class,'storePelanggan']);

Route::get('/register-pelanggan', [RegisterController::class,'indexPelanggan']
);

Route::get('/', function () {
    return view('welcome');
});
