<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_slug',
        'plan_type',
        'cashier_subscription_name',
        'status',
        'subscription_started_at',
        'subscription_expires_at',
    ];

    protected $casts = [
        'subscription_started_at' => 'datetime',
        'subscription_expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'client_subscription_id');
    }

    public function planConfig(): ?array
    {
        return config('plans.' . $this->plan_slug);
    }

    public function isActive(): bool
    {
        if ($this->status !== 'active') {
            return false;
        }

        $conf = $this->planConfig();
        if ($conf && ($conf['is_annual'] ?? false) && $this->subscription_expires_at) {
            return $this->subscription_expires_at->isFuture();
        }

        return true;
    }

    public function dashboardRoute(): string
    {
        $conf = $this->planConfig();
        return $conf['dashboard'] ?? 'dashboard';
    }

    public function categoryLabel(): string
    {
        $conf = $this->planConfig();
        return $conf['subtitle'] ?? 'Plano';
    }
}
