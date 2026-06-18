<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'title', 'file_path', 'type', 'file_size', 'order'];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
