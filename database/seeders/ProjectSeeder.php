<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Project::create([
        'user_id' => 1, // Certifique-se que seu ID é 1 ou mude aqui
        'name' => 'Meu Primeiro Site Cyber',
        'progress' => 35,
        'status' => 'Desenvolvimento de Backend',
        'steps' => json_encode(['Briefing', 'Design']),
        'preview_url' => 'http://127.0.0.1:8000/staging',
    ]);
}
}
