<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'cityofcloudsbusiness@gmail.com'],
            [
                'name'     => 'City of Clouds',
                'email'    => 'cityofcloudsbusiness@gmail.com',
                'password' => Hash::make('codigo10'),
                'role'     => 'admin',
            ]
        );
    }
}
