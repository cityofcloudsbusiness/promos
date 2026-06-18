<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmpresaPilar extends Model
{
    protected $table    = 'empresa_pilares';
    protected $fillable = ['empresa_id', 'pilar', 'status', 'progresso', 'observacoes'];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function label(): string
    {
        return match ($this->pilar) {
            'diagnostico'   => 'Diagnóstico',
            'planejamento'  => 'Planejamento',
            'implementacao' => 'Implementação',
            'otimizacao'    => 'Otimização',
            default         => ucfirst($this->pilar),
        };
    }

    public function statusColor(): string
    {
        return match ($this->status) {
            'completed'   => 'emerald',
            'in_progress' => 'amber',
            default       => 'slate',
        };
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'completed'   => 'Concluído',
            'in_progress' => 'Em andamento',
            default       => 'Pendente',
        };
    }
}
