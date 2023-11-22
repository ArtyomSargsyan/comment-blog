<?php

namespace Database\Seeders\AdminSeeder;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'is_admin' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
