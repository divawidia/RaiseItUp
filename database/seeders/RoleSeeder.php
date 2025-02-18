<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = Role::create(['name' => 'owner']);
        $fundraiser = Role::create(['name' => 'fundraiser']);

        $userOwner = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'avatar' => 'images/avatar.png',
        ])->assignRole($owner);
    }
}
