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
    }
}
