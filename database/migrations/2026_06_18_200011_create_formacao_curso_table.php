<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formacao_curso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formacao_id')->constrained('formacoes')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->integer('order')->default(0);
            $table->unique(['formacao_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formacao_curso');
    }
};
