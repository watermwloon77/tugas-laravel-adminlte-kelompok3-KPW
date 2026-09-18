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
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $kasirRole = Role::firstOrCreate(['name' => 'kasir']);
        $ownerRole = Role::firstOrCreate(['name' => 'owner']);

        // 2. Buat Akun Admin Default untuk Login
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Administrator Toko',
                'password' => Hash::make('password'),
                'role_id'  => $adminRole->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'kasir@gmail.com'],
            [
                'name'     => 'Kasir Toko Buket',
                'password' => Hash::make('password'),
                'role_id'  => $kasirRole->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'owner@gmail.com'],
            [
                'name'     => 'Owner / Pemilik Toko',
                'password' => Hash::make('password'),
                'role_id'  => $ownerRole->id,
            ]
        );
    }
}