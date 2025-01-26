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
        // !! seeding data user pegawai TU, kepala bagian, and peminjam
        DB::table('users')->insert([
            'name' => 'pegawai TU 1',
            'email' => 'pegawaitu@contoh.com',
            'password' => Hash::make('12345678'),
            'role' => UserRole::pegawaitu,
        ]);
        DB::table('users')->insert([
            'name' => 'Kepala Bagian',
            'email' => 'kabag@contoh.com',
            'password' => Hash::make('12345678'),
            'role' => UserRole::kabag,
        ]);
        DB::table('users')->insert([
            'name' => 'peminjam 1',
            'email' => 'peminjam1@contoh.com',
            'password' => Hash::make('12345678'),
            'role' => UserRole::peminjam,
        ]);
        // !! seeding kriteria table
        DB::table('kriteria')->insert([[
            'nama_kriteria' => 'tingkat kerusakan',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'c',// cost atau benefit
            'bobot_kriteria' => '0.3',
            'simbol_kriteria' => 'c1',
        ], [
            'nama_kriteria' => 'usia',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
            'simbol_kriteria' => 'c2',
        ], [
            'nama_kriteria' => 'frekuensi pemakaian',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'b', // cost atau benefit
            'bobot_kriteria' => '0.2',
            'simbol_kriteria' => 'c3',

        ], [
            'nama_kriteria' => 'Biaya Maintenance',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
            'simbol_kriteria' => 'c4',

        ], [
            'nama_kriteria' => 'Feedback Peminjaman',
            'kriteria_kategori_aset' => 'e', // elektronik atau kendaraan
            'jenis_kriteria' => 'b', // cost atau benefit
            'bobot_kriteria' => '0.1',
            'simbol_kriteria' => 'c5',

        ], [
            'nama_kriteria' => 'tingkat kerusakan',
            'kriteria_kategori_aset' => 'k', // !elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.3',
            'simbol_kriteria' => 'c1',
        ], [
            'nama_kriteria' => 'usia',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
            'simbol_kriteria' => 'c2',
        ], [
            'nama_kriteria' => 'jarak tempuh',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
            'simbol_kriteria' => 'c3',
        ], [
            'nama_kriteria' => 'Biaya Maintenance',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'c', // cost atau benefit
            'bobot_kriteria' => '0.2',
            'simbol_kriteria' => 'c4',
        ], [
            'nama_kriteria' => 'Feedback Peminjaman',
            'kriteria_kategori_aset' => 'k', // elektronik atau kendaraan
            'jenis_kriteria' => 'b', // cost atau benefit
            'bobot_kriteria' => '0.1',
            'simbol_kriteria' => 'c5',
        ]
    ]);
    }
}
