<?php

namespace Database\Seeders;

use App\Models\Access;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Access::create([
            'role_id' => 1,
            'menu_id' =>1
        ]);
        Access::create([
            'role_id' => 1,
            'menu_id' =>2
        ]);
        Access::create([
            'role_id' => 1,
            'menu_id' =>3
        ]);
    }
}
