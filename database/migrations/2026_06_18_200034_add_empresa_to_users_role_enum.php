<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('aluno','professor','admin','empresa') NOT NULL DEFAULT 'aluno'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('aluno','professor','admin') NOT NULL DEFAULT 'aluno'");
    }
};
