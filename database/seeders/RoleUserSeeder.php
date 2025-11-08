<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update an admin user
        User::updateOrCreate(
            ['email' => 'admin@rentway.test'],
            [
                'name' => 'API Admin',
                'password' => Hash::make('password'),
                'usertype' => 'admin',
            ]
        );

        // Manager
        User::updateOrCreate(
            ['email' => 'manager@rentway.test'],
            [
                'name' => 'API Manager',
                'password' => Hash::make('password'),
                'usertype' => 'manager',
            ]
        );

        // Standard user
        User::updateOrCreate(
            ['email' => 'user@rentway.test'],
            [
                'name' => 'API User',
                'password' => Hash::make('password'),
                'usertype' => 'user',
            ]
        );
    }
}
