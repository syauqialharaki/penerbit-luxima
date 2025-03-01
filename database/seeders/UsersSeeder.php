<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\roles;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesAdmin = roles::where('name', 'admin')->first();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => $rolesAdmin->id,
            'password' => Hash::make('12345678'),

        ]);
    }
}
