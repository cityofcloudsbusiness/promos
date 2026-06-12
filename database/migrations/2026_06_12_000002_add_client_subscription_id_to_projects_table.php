<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('client_subscription_id')
                  ->nullable()
                  ->after('user_id')
                  ->constrained('client_subscriptions')
                  ->nullOnDelete();
        });

        // Associa projetos existentes à subscription migrada do mesmo usuário
        $projects = DB::table('projects')->whereNull('client_subscription_id')->get();
        foreach ($projects as $project) {
            $sub = DB::table('client_subscriptions')
                ->where('user_id', $project->user_id)
                ->where('status', 'active')
                ->orderBy('created_at')
                ->first();
            if ($sub) {
                DB::table('projects')
                    ->where('id', $project->id)
                    ->update(['client_subscription_id' => $sub->id]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['client_subscription_id']);
            $table->dropColumn('client_subscription_id');
        });
    }
};
