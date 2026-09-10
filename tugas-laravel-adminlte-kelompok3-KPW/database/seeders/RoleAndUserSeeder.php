<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Role
        $adminRole = Role::create(['name' => 'admin']);
        $kasirRole = Role::create(['name' => 'kasir']);

        // 2. Buat Akun Admin Default untuk Login
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role_id'  => $adminRole->id,
        ]);
    }
}