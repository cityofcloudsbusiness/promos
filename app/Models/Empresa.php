<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    protected $fillable = [
        'gestor_id', 'nome', 'cnpj', 'segmento', 'logo_path',
        'telefone', 'email_corporativo', 'cidade', 'estado', 'status',
    ];

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'gestor_id');
    }

    public function funcionarios(): HasMany
    {
        return $this->hasMany(EmpresaFuncionario::class);
    }

    public function pilares(): HasMany
    {
        return $this->hasMany(EmpresaPilar::class);
    }

    public function cursoAcessos(): HasMany
    {
        return $this->hasMany(EmpresaCursoAcesso::class);
    }

    public function progressoGeral(): int
    {
        if ($this->pilares->isEmpty()) return 0;
        return (int) $this->pilares->avg('progresso');
    }

    public function segmentoLabel(): string
    {
        return match ($this->segmento) {
            'tecnologia'          => 'Tecnologia',
            'logistica'           => 'Logística',
            'saude'               => 'Saúde',
            'educacao'            => 'Educação',
            'varejo'              => 'Varejo',
            'industria'           => 'Indústria',
            'financeiro'          => 'Serviços Financeiros',
            'construcao'          => 'Construção Civil',
            default               => 'Outro',
        };
    }
}
