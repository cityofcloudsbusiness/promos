<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Project.php

class Project extends Model
{
    protected $fillable = ['user_id', 'name', 'progress', 'status', 'steps', 'preview_url'];

    protected $casts = [
        'steps' => 'array', // Mantém o JSON como array no PHP
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // ADICIONE ESTA RELAÇÃO AQUI:
    public function employee() {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    /**
     * ATRIBUTO DINÂMICO DE PROGRESSO
     * Calcula a porcentagem com base nos steps: [{"task": "...", "completed": true}]
     */
    public function getDynamicProgressAttribute()
    {
        // Se não houver steps definidos, retorna o valor manual da coluna 'progress'
        if (empty($this->steps) || !is_array($this->steps)) {
            return $this->progress ?? 0;
        }

        $totalSteps = count($this->steps);
        $completedSteps = collect($this->steps)->where('completed', true)->count();

        if ($totalSteps === 0) return 0;

        return round(($completedSteps / $totalSteps) * 100);
    }
}