<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRole;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => 'pegawai TU 1',
        //     'email' => 'pegawaitu@contoh.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => UserRole::pegawaitu,
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Kepala Bagian',
        //     'email' => 'kabag@contoh.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => UserRole::kabag,
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'peminjam 1',
        //     'email' => 'peminjam1@contoh.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => UserRole::peminjam,
        // ]);
        DB::table('kriteria')->insert([[
            'nama_kriteria' => 'tingkat kerusakan',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'c',// cost atau benefit
            'bobot_kriteria' => '0.3',
        ], [
            'nama_kriteria' => 'usia',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
        ], [
            'nama_kriteria' => 'frekuensi pemakaian',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'b', // cost atau benefit
            'bobot_kriteria' => '0.2',
        ], [
            'nama_kriteria' => 'Biaya Maintenance',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
        ], [
            'nama_kriteria' => 'Feedback Peminjaman',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'b', // cost atau benefit
            'bobot_kriteria' => '0.1',
        ], [
            'nama_kriteria' => 'tingkat kerusakan',
            'kriteria_kategori_aset' => 'k', // !elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.3',
        ], [
            'nama_kriteria' => 'usia',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
        ], [
            'nama_kriteria' => 'jarak tempuh',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
        ], [
            'nama_kriteria' => 'Biaya Maintenance',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
        ], [
            'nama_kriteria' => 'Feedback Peminjaman',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'b', // cost atau benefit
            'bobot_kriteria' => '0.1',
        ]
    ]);
    }
}
