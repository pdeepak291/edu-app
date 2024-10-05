<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Edu App',
            'branch' => 'Kannur',
            'address' => 'Kannur, Kerala',
            'mobile' => '9876543210',
            'email' => 'eduapp@gmail.com',
            'logo' => 'logo.jpg',
            'gstno' => 'ABCD123456',
        ]);
    }
}
