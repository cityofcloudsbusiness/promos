<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresa_pilares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->cascadeOnDelete();
            $table->enum('pilar', ['diagnostico', 'planejamento', 'implementacao', 'otimizacao']);
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->unsignedTinyInteger('progresso')->default(0);
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->unique(['empresa_id', 'pilar']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresa_pilares');
    }
};
