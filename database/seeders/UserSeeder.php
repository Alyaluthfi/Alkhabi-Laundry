<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'superadmin']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // Create a default superadmin user
        $superadmin = User::firstOrCreate([
            'email' => 'alkhabi@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Alkhabi Superadmin',
        ]);

        $superadmin->assignRole('superadmin');

        // Create a default admin user
        $admin = User::firstOrCreate([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Admin',
        ]);

        $admin->assignRole('admin');

        // Create a default regular user
        $user = User::firstOrCreate([
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Budi',
        ]);

        $user->assignRole('user');
    }
}