<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessRequest extends Model
{
    protected $fillable = [
        'user_id', 'course_id', 'formacao_id',
        'status', 'message', 'reviewed_by', 'reviewed_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function formacao(): BelongsTo
    {
        return $this->belongsTo(Formacao::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function subjectName(): string
    {
        return $this->course?->title ?? $this->formacao?->title ?? '—';
    }

    public function subjectType(): string
    {
        return $this->course_id ? 'Curso' : 'Formação';
    }
}
