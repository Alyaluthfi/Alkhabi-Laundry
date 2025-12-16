<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User ADMIN (Wajib punya role 'admin')
        User::factory()->create([
            'name' => 'Admin Alkhabi',
            'email' => 'admin@alkhabi.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // <--- INI KUNCINYA
        ]);

        // 2. Buat User Pelanggan (Role 'konsumen')
        User::factory()->create([
            'name' => 'Pelanggan Santuy',
            'email' => 'user@alkhabi.com',
            'password' => Hash::make('password'),
            'role' => 'konsumen',
        ]);
    }
}