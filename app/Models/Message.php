<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Message.php

class Message extends Model
{
    protected $fillable = ['project_id', 'user_id', 'content', 'attachment'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}