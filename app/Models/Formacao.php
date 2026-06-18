<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formacao extends Model
{
    use HasFactory;

    protected $table = 'formacoes';

    protected $fillable = [
        'instructor_id', 'title', 'slug', 'description',
        'thumbnail', 'status', 'area', 'duration_hours', 'order',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'formacao_curso')
            ->withPivot('order')
            ->orderByPivot('order');
    }

    public function formacaoEnrollments(): HasMany
    {
        return $this->hasMany(FormacaoEnrollment::class);
    }

    public function accessRequests(): HasMany
    {
        return $this->hasMany(AccessRequest::class);
    }

    public function isEnrolledBy(User $user): bool
    {
        return $this->formacaoEnrollments()->where('user_id', $user->id)->exists();
    }

    public function totalLessons(): int
    {
        return $this->courses->sum(fn ($c) => $c->lessons_count ?? 0);
    }
}
