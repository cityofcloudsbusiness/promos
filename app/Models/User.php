<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable; // <--- 1. Importe a Trait do Cashier

#[Fillable(['name', 'email', 'password', 'role', 'subscription_type', 'subscription_started_at', 'subscription_expires_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, Billable; // <--- 2. Adicione a Trait Billable aqui

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'subscription_started_at' => 'datetime',
            'subscription_expires_at' => 'datetime',
        ];
    }

    public function getPlanLabelAttribute(): string
    {
        if ($this->subscription_type === 'annual') {
            return 'Anual';
        }

        if ($this->subscribed('default')) {
            return 'Mensal';
        }

        return 'Sem Plano';
    }

    public function getAnnualDaysRemainingAttribute(): ?int
    {
        if ($this->subscription_type !== 'annual' || ! $this->subscription_expires_at) {
            return null;
        }

        $days = now()->diffInDays($this->subscription_expires_at, false);

        return $days >= 0 ? $days : 0;
    }

    // app/Models/User.php

    public function project()
    {
        return $this->hasOne(Project::class); // Um usuário tem um projeto
    }

    public function messages()
    {
        return $this->hasMany(Message::class); // Um usuário pode enviar várias mensagens
    }

    public function assignedProjects()
    {
        return $this->belongsToMany(Project::class, 'project_user');
    }


}
