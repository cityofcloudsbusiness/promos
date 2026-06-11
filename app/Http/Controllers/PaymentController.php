<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Laravel\Cashier\Cashier;

class PaymentController extends Controller
{
    public function success(Request $request, string $plan = 'monthly')
    {
        $sessionId = $request->query('session_id');

        if (! $sessionId) {
            return redirect()->route('dashboard')->with('error', 'Sessão de pagamento não encontrada.');
        }

        try {
            $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId, [
                'expand' => ['subscription'],
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Não foi possível verificar o pagamento.');
        }

        if ($plan === 'annual') {
            if ($session->payment_status !== 'paid') {
                return redirect()->route('subscribeWebM')->with('error', 'Pagamento anual não confirmado.');
            }

            $user = $request->user();
            $user->subscription_type = 'annual';
            $user->subscription_started_at = now();
            $user->subscription_expires_at = now()->addYear();
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Assinatura anual ativada com sucesso.');
        }

        $user = $request->user();
        $subscription = $user->subscription('default');

        if ($subscription && $subscription->active()) {
            $user->subscription_type = 'monthly';
            $user->subscription_started_at = $subscription->created_at ?? now();
            $user->subscription_expires_at = null;
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Assinatura mensal confirmada.');
        }

        return redirect()->route('subscribeWebM')->with('error', 'Não foi possível confirmar a assinatura.');
    }

    public function settings(Request $request): View
    {
        return view('profile.settings', [
            'user' => $request->user(),
            'subscription_type' => $request->user()->plan_label,
            'annual_days_left' => $request->user()->annual_days_remaining,
        ]);
    }
}
