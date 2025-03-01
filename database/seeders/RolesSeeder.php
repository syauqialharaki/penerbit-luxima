<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create(
            [
                'name' => 'user',
            ]
        );
        Roles::create(
            [
                'name' => 'admin',
            ]
        );
    }
}
