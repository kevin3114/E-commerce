<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);
    }
}
