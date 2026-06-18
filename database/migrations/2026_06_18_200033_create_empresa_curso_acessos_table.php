<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresa_curso_acessos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->unsignedInteger('slots_total')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->unique(['empresa_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresa_curso_acessos');
    }
};
