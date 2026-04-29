<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador Vitor ',
            'email' => 'cityofcloudsbusiness@gmail.com',
            'password' => Hash::make('codigo10'), // Defina sua senha aqui
            'role' => 'admin', // Aqui está o segredo para acessar o painel
        ]);

        $this->command->info('Usuário Admin criado com sucesso!');
    }
}