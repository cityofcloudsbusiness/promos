<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('plan_slug');
            $table->string('plan_type');
            $table->string('cashier_subscription_name')->nullable();
            $table->enum('status', ['pending', 'active', 'cancelled', 'expired'])->default('pending');
            $table->timestamp('subscription_started_at')->nullable();
            $table->timestamp('subscription_expires_at')->nullable();
            $table->timestamps();
        });

        // Migra usuários existentes que já tinham subscription_type preenchido
        $typeToSlug = [
            'monthly'              => 'site-mensal',
            'annual'               => 'site-anual',
            'ia'                   => 'site-ia',
            'marketing-aceleracao' => 'marketing-aceleracao',
            'marketing-dominancia' => 'marketing-dominancia',
            'ia-starter'           => 'ia-starter',
            'ia-autonoma'          => 'ia-autonoma',
        ];

        $users = DB::table('users')->whereNotNull('subscription_type')->get();
        foreach ($users as $user) {
            $slug = $typeToSlug[$user->subscription_type] ?? null;
            if (!$slug) continue;

            DB::table('client_subscriptions')->insert([
                'user_id'                 => $user->id,
                'plan_slug'               => $slug,
                'plan_type'               => $user->subscription_type,
                'cashier_subscription_name' => 'plan_legacy_' . $user->id,
                'status'                  => 'active',
                'subscription_started_at' => $user->subscription_started_at ?? now(),
                'subscription_expires_at' => $user->subscription_expires_at,
                'created_at'              => now(),
                'updated_at'              => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('client_subscriptions');
    }
};
