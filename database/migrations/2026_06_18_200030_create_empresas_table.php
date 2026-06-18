<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gestor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nome');
            $table->string('cnpj', 18)->unique();
            $table->string('segmento')->default('outro');
            $table->string('logo_path')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_corporativo');
            $table->string('cidade')->nullable();
            $table->string('estado', 2)->nullable();
            $table->enum('status', ['pending', 'active', 'suspended'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
