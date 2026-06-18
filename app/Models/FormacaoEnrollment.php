<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormacaoEnrollment extends Model
{
    protected $fillable = [
        'user_id', 'formacao_id', 'plan_type',
        'enrolled_at', 'expires_at', 'completed_at',
    ];

    protected $casts = [
        'enrolled_at'  => 'datetime',
        'expires_at'   => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formacao(): BelongsTo
    {
        return $this->belongsTo(Formacao::class);
    }

    public function isActive(): bool
    {
        return $this->expires_at === null || $this->expires_at->isFuture();
    }

    public function planLabel(): string
    {
        return match ($this->plan_type) {
            'monthly' => 'Mensal',
            'annual'  => 'Anual',
            default   => 'Gratuito',
        };
    }

    public function planBadgeClass(): string
    {
        return match ($this->plan_type) {
            'monthly' => 'bg-indigo-100 text-indigo-700',
            'annual'  => 'bg-violet-100 text-violet-700',
            default   => 'bg-slate-100 text-slate-600',
        };
    }
}
