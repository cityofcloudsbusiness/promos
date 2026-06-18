<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id', 'title', 'description', 'video_url',
        'video_type', 'duration_seconds', 'order', 'is_free_preview',
    ];

    protected $casts = [
        'is_free_preview' => 'boolean',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class)->orderBy('order');
    }

    public function progress(): HasMany
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function getEmbedUrlAttribute(): string
    {
        return match ($this->video_type) {
            'youtube' => 'https://www.youtube.com/embed/' . $this->extractYoutubeId(),
            'vimeo'   => 'https://player.vimeo.com/video/' . $this->extractVimeoId(),
            default   => $this->video_url ?? '',
        };
    }

    private function extractYoutubeId(): string
    {
        preg_match('/(?:v=|youtu\.be\/)([A-Za-z0-9_-]{11})/', $this->video_url ?? '', $m);
        return $m[1] ?? $this->video_url ?? '';
    }

    private function extractVimeoId(): string
    {
        preg_match('/vimeo\.com\/(\d+)/', $this->video_url ?? '', $m);
        return $m[1] ?? $this->video_url ?? '';
    }
}
