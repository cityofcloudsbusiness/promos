<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('subscription_type')->nullable()->after('role');
            $table->timestamp('subscription_started_at')->nullable()->after('subscription_type');
            $table->timestamp('subscription_expires_at')->nullable()->after('subscription_started_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['subscription_type', 'subscription_started_at', 'subscription_expires_at']);
        });
    }
};
