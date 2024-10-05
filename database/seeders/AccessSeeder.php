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
        for($i=1;$i<=11;$i++){
            Access::create([
                'role_id' => 1,
                'menu_id' => $i
            ]);
        }
    }
}
