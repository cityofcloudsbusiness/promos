<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Adicionado 'employee_id' para que o Super Admin possa salvar o responsável
    protected $fillable = [
        'user_id',
        'client_subscription_id',
        'name',
        'progress',
        'status',
        'steps',
        'preview_url',
        'employee_id',
        'meta',
    ];

    protected $casts = [
        'steps' => 'array',
        'meta'  => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clientSubscription()
    {
        return $this->belongsTo(ClientSubscription::class);
    }

    // Relacionamento com o Programador Responsável
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // Para o caso de múltiplos desenvolvedores (Muitos para Muitos)
    public function developers()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

    // Sistema de Mensagens (Chat)
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * ATRIBUTO DINÂMICO DE PROGRESSO
     * Mantive exatamente sua lógica original para não quebrar o dashboard do cliente
     */
    public function getDynamicProgressAttribute()
    {
        if (empty($this->steps) || !is_array($this->steps)) {
            return $this->progress ?? 0;
        }

        $totalSteps = count($this->steps);
        $completedSteps = collect($this->steps)->where('completed', true)->count();

        if ($totalSteps === 0) return 0;

        return round(($completedSteps / $totalSteps) * 100);
    }
}