<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Super Admin',
            'gender' => 'male',
            'dob' => '1995-01-01',
            'mobile' => '9876543210',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin@123')
        ]);
    }
}
