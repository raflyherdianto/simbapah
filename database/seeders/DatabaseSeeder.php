<?php

namespace Database\Seeders;

use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        KategoriSampah::create([
            'kode_kategori' => 'KTG-1',
            'nama' => 'Organik',
        ]);
        KategoriSampah::create([
            'kode_kategori' => 'KTG-2',
            'nama' => 'Anorganik',
        ]);
        JenisSampah::create([
            'kode_jenis' => 'KTJ-1',
            'nama' => 'Botol Plastik',
            'kategori_sampah_id' => 2,
            'harga_satuan' => 100,
        ]);
        JenisSampah::create([
            'kode_jenis' => 'KTJ-2',
            'nama' => 'Kertas',
            'kategori_sampah_id' => 2,
            'harga_satuan' => 200,
        ]);
    }
}
