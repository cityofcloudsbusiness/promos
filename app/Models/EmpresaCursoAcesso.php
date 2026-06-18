<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmpresaCursoAcesso extends Model
{
    protected $fillable = ['empresa_id', 'course_id', 'slots_total', 'expires_at'];

    protected $casts = ['expires_at' => 'datetime'];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function isAtivo(): bool
    {
        return $this->expires_at === null || $this->expires_at->isFuture();
    }
}
