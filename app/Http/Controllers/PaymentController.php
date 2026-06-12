<?php

namespace App\Http\Controllers;

use App\Models\ClientSubscription;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Cashier\Cashier;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $csId      = $request->query('cs_id');

        if (!$sessionId) {
            return redirect()->route('dashboard')->with('error', 'Sessão de pagamento não encontrada.');
        }

        try {
            $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId, [
                'expand' => ['subscription'],
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Não foi possível verificar o pagamento.');
        }

        if ($session->payment_status !== 'paid') {
            return redirect()->route('dashboard')->with('error', 'Pagamento não confirmado.');
        }

        $user = $request->user();

        // — Novo sistema: ClientSubscription —
        if ($csId) {
            $clientSub = ClientSubscription::where('id', $csId)
                ->where('user_id', $user->id)
                ->where('status', 'pending')
                ->first();

            if ($clientSub) {
                $planConf = config('plans.' . $clientSub->plan_slug);

                $clientSub->update([
                    'status'                  => 'active',
                    'subscription_started_at' => now(),
                    'subscription_expires_at' => ($planConf['is_annual'] ?? false) ? now()->addYear() : null,
                ]);

                // Cria o projeto da assinatura
                $project = $this->createProjectForSubscription($user->id, $clientSub->id, $planConf);

                // Backward compat: atualiza campo legado no user
                $user->subscription_type       = $planConf['type'];
                $user->subscription_started_at = now();
                $user->subscription_expires_at = ($planConf['is_annual'] ?? false) ? now()->addYear() : null;
                $user->save();

                return redirect()
                    ->route('dashboard.plan', ['id' => $clientSub->id])
                    ->with('success', 'Assinatura ' . $planConf['label'] . ' confirmada com sucesso!');
            }
        }

        // — Fallback legado (sem cs_id) —
        $plan     = $request->route('plan', 'site-mensal');
        $legacyMap = ['monthly' => 'site-mensal', 'annual' => 'site-anual', 'ia' => 'site-ia'];
        if (isset($legacyMap[$plan])) $plan = $legacyMap[$plan];

        $plans = config('plans', []);
        if (!isset($plans[$plan])) {
            return redirect()->route('subscribeWebM')->with('error', 'Plano desconhecido.');
        }

        $planConfig = $plans[$plan];
        $user->subscription_type       = $planConfig['type'];
        $user->subscription_started_at = now();
        $user->subscription_expires_at = $planConfig['is_annual'] ? now()->addYear() : null;
        $user->save();

        // Cria ClientSubscription para o legado também
        $cs = ClientSubscription::create([
            'user_id'                 => $user->id,
            'plan_slug'               => $plan,
            'plan_type'               => $planConfig['type'],
            'cashier_subscription_name' => 'plan_legacy_' . $user->id . '_' . time(),
            'status'                  => 'active',
            'subscription_started_at' => now(),
            'subscription_expires_at' => $planConfig['is_annual'] ? now()->addYear() : null,
        ]);

        $this->createProjectForSubscription($user->id, $cs->id, $planConfig);

        return redirect()
            ->route('dashboard.plan', ['id' => $cs->id])
            ->with('success', 'Assinatura ' . $planConfig['label'] . ' confirmada com sucesso!');
    }

    public function settings(Request $request): View
    {
        return view('profile.settings', [
            'user'              => $request->user(),
            'subscription_type' => $request->user()->plan_label,
            'annual_days_left'  => $request->user()->annual_days_remaining,
        ]);
    }

    private function createProjectForSubscription(int $userId, int $clientSubId, array $planConf): Project
    {
        // Verifica se já existe projeto para essa subscription
        $existing = Project::where('client_subscription_id', $clientSubId)->first();
        if ($existing) return $existing;

        $dashCategory = $planConf['dashboard'] ?? 'dashboard';
        $prefix = match(true) {
            str_starts_with($planConf['type'], 'marketing') => 'MKT_',
            str_starts_with($planConf['type'], 'ia-')       => 'IA_',
            default                                          => 'Project_',
        };

        $steps = match($dashCategory) {
            'dashboard.marketing' => [
                ['title' => 'Diagnóstico Inicial',       'completed' => false],
                ['title' => 'Criação dos Criativos',     'completed' => false],
                ['title' => 'Configuração de Campanhas', 'completed' => false],
                ['title' => 'Lançamento',                'completed' => false],
                ['title' => 'Otimização Contínua',       'completed' => false],
            ],
            'dashboard.ia' => [
                ['title' => 'Treinamento do Agente',  'completed' => false],
                ['title' => 'Integração WhatsApp',    'completed' => false],
                ['title' => 'Fase de Testes',         'completed' => false],
                ['title' => 'Go Live',                'completed' => false],
                ['title' => 'Otimização Contínua',    'completed' => false],
            ],
            default => [
                ['title' => 'Project Analysis',    'completed' => false],
                ['title' => 'Architecture Design', 'completed' => false],
                ['title' => 'Development Phase',   'completed' => false],
                ['title' => 'Quality Assurance',   'completed' => false],
                ['title' => 'Final Delivery',      'completed' => false],
            ],
        };

        return Project::create([
            'user_id'                => $userId,
            'client_subscription_id' => $clientSubId,
            'name'                   => $prefix . strtoupper(substr(md5($userId . $clientSubId), 0, 6)),
            'status'                 => 'Initializing',
            'progress'               => 0,
            'steps'                  => $steps,
        ]);
    }
}
