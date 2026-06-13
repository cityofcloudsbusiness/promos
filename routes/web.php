<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ClientSubscription;
use App\Models\Project;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| 1. ÁREA PÚBLICA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('site.index');
})->name('home');

Route::get('/manutencao', function () {
    return view('site.page2.principal');
})->name('manutencao');

Route::get('/marketing', function () {
    return view('site.page3.principal');
})->name('marketing');

Route::get('/ia', function () {
    return view('site.page4.principal');
})->name('ia');

Route::get('sobre', function () {
    return view('site.page5.principal');
})->name('sobre');

Route::get('/contato/{context?}', function (Request $request, ?string $context = null) {
    $contexts = [
        'shark' => [
            'pageTitle' => 'Ativar Parceria Shark',
            'subject' => 'Parceria Shark',
            'message' => 'Tenho interesse em ativar uma parceria Shark e gostaria de receber os próximos passos.',
        ],
        'agente-comercial' => [
            'pageTitle' => 'Contratar Meu Agente Comercial',
            'subject' => 'Contratar Agente Comercial',
            'message' => 'Quero contratar um agente comercial para meu projeto e receber um contato urgente.',
        ],
         'arquiteto-ia' => [
            'pageTitle' => 'Suporte Arquiteto de Agentes de IA',
            'subject' => 'Suporte arquiteto de ia',
            'message' => 'Quero entender mais sobre Agentes no meu negocio.',
        ],'mapainsta' => [
            'pageTitle' => 'Colocando Minha Empresa no Instagram Maps',
            'subject' => 'Minha Empresa no Instagram Maps',
            'message' => 'Quero colocar minha empresa no Instagram Maps e dominar minha região, gostaria de um contato e um orçamento para isso.',
        ],
    ];

    $contextData = $contexts[$context] ?? [
        'pageTitle' => 'Fale Conosco',
        'subject' => 'Contato Geral',
        'message' => 'Olá, gostaria de receber mais informações sobre os serviços da City of Clouds.',
    ];

    return view('site.contact', compact('contextData'));
})->name('contact');

Route::post('/contato', function (Request $request) {
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    try {
        Mail::to('mensagemclientes@cityofclouds.com.br')
            ->send(new ContactMail(
                $request->input('name'),
                $request->input('email'),
                $request->input('subject'),
                $request->input('message'),
            ));
    } catch (\Exception $e) {
        logger()->error('Erro ao enviar email de contato: ' . $e->getMessage());
        return back()->with('error', 'Ocorreu um erro ao enviar sua mensagem. Tente novamente em instantes.');
    }

    return back()->with('success', 'Sua mensagem foi enviada com sucesso! Em breve entraremos em contato.');
})->name('contact.send');

/*
|--------------------------------------------------------------------------
| 2. FLUXO DE PAGAMENTO (STRIPE)
|--------------------------------------------------------------------------
*/

// Rota pública de plano — não redireciona usuários já assinantes (podem adicionar mais planos)
Route::get('/assinar/{plan}', function (Request $request, string $plan) {
    $plans = config('plans');

    if (!isset($plans[$plan])) {
        abort(404);
    }

    if (!auth()->check()) {
        session(['intended_plan' => $plan]);
        return redirect()->route('register');
    }

    $user = auth()->user();

    if ($user->role === 'admin' || $user->role === 'employee') {
        return redirect()->route('admin.projects.index');
    }

    return view('site.pagamentos.plano', [
        'planSlug' => $plan,
        'plan'     => $plans[$plan],
    ]);
})->where('plan', '[a-z0-9-]+')->name('assinar');

Route::middleware(['auth', 'verified'])->group(function () {

    // Seleção de planos — acessível mesmo para usuários já assinantes (adicionar mais planos)
    Route::get('/subscribeWebM', function () {
        $user = auth()->user();
        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }
        return view('site.pagamentos.inscricaoWebSiteManu');
    })->name('subscribeWebM');

    // Compat: redireciona links antigos
    Route::get('/subscribeWebM/plano/{plan}', function (string $plan) {
        $map = ['monthly' => 'site-mensal', 'annual' => 'site-anual', 'ia' => 'site-ia'];
        return redirect()->route('assinar', ['plan' => $map[$plan] ?? 'site-mensal']);
    })->where('plan', 'monthly|annual|ia')->name('subscribeWebM.plan');

    // Checkout Stripe — cria ClientSubscription pendente antes de redirecionar ao Stripe
    Route::get('/checkout-assinatura/{plan?}', function (Request $request, string $plan = 'site-mensal') {
        if ($request->user()->role === 'admin' || $request->user()->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        $legacyMap = ['monthly' => 'site-mensal', 'annual' => 'site-anual', 'ia' => 'site-ia'];
        if (isset($legacyMap[$plan])) $plan = $legacyMap[$plan];

        $plans = config('plans');
        if (!isset($plans[$plan])) abort(404, 'Plano não encontrado.');

        $priceId      = $plans[$plan]['stripe_price_id'] ?? null;
        $checkoutMode = $plans[$plan]['checkout_mode']   ?? 'subscription';

        if (!$priceId) {
            return redirect()->route('assinar', ['plan' => $plan])
                ->with('info', 'Este plano está sendo configurado. Entre em contato com nossa equipe.');
        }

        // Cria registro pendente da assinatura
        $clientSub = ClientSubscription::create([
            'user_id'   => $request->user()->id,
            'plan_slug' => $plan,
            'plan_type' => $plans[$plan]['type'],
            'status'    => 'pending',
        ]);

        $subscriptionName = 'plan_' . $clientSub->id;
        $clientSub->update(['cashier_subscription_name' => $subscriptionName]);

        $successUrl = route('payment.success') . '?success=true&session_id={CHECKOUT_SESSION_ID}&cs_id=' . $clientSub->id;
        $cancelUrl  = route('assinar', ['plan' => $plan]) . '?error=cancel';

        if ($checkoutMode === 'payment') {
            return $request->user()->checkout([$priceId => 1], [
                'success_url' => $successUrl,
                'cancel_url'  => $cancelUrl,
            ]);
        }

        return $request->user()
            ->newSubscription($subscriptionName, $priceId)
            ->checkout([
                'success_url' => $successUrl,
                'cancel_url'  => $cancelUrl,
            ]);
    })->name('checkout');

    Route::get('/billing-portal', function (Request $request) {
        if ($request->user()->role === 'admin' || $request->user()->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }
        return $request->user()->redirectToBillingPortal(route('dashboard'));
    })->name('billing');

    Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
    // Compat legado com plan param
    Route::get('/payment-success/{plan}', [PaymentController::class, 'success']);
});


/*
|--------------------------------------------------------------------------
| 3. ÁREA DO CLIENTE (DASHBOARD & CHAT)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // ── Visão geral: redireciona para o plano único ou mostra overview se vários ──
    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        $activeSubs = $user->activeClientSubscriptions()
            ->where(function ($q) {
                $q->whereNull('subscription_expires_at')
                  ->orWhere('subscription_expires_at', '>', now());
            })
            ->latest()
            ->get();

        if ($activeSubs->isEmpty()) {
            return redirect()->route('subscribeWebM');
        }

        if ($activeSubs->count() === 1) {
            return redirect()->route('dashboard.plan', ['id' => $activeSubs->first()->id]);
        }

        return view('dashboard.overview', ['allSubs' => $activeSubs]);
    })->name('dashboard');

    // ── Dashboard específico por ID de assinatura ──
    Route::get('/dashboard/{id}', function (Request $request, int $id) {
        $user = $request->user();

        if ($user->role === 'admin' || $user->role === 'employee') {
            return redirect()->route('admin.projects.index');
        }

        $clientSub = $user->activeClientSubscriptions()
            ->where('id', $id)
            ->where(function ($q) {
                $q->whereNull('subscription_expires_at')
                  ->orWhere('subscription_expires_at', '>', now());
            })
            ->first();

        if (!$clientSub) {
            return redirect()->route('dashboard');
        }

        $allSubs  = $user->activeClientSubscriptions()->latest()->get();
        $planConf = config('plans.' . $clientSub->plan_slug);

        // Garante que o projeto existe
        if (!$clientSub->project) {
            $prefix = match(true) {
                str_starts_with($clientSub->plan_slug, 'marketing-') => 'MKT_',
                str_starts_with($clientSub->plan_slug, 'ia-')        => 'IA_',
                default                                               => 'Project_',
            };
            $steps = match($planConf['dashboard'] ?? 'dashboard') {
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
            $project = Project::create([
                'user_id'                => $user->id,
                'client_subscription_id' => $clientSub->id,
                'name'                   => $prefix . strtoupper(substr(md5($user->id . $clientSub->id), 0, 6)),
                'status'                 => 'Initializing',
                'progress'               => 0,
                'steps'                  => $steps,
            ]);
            $clientSub->refresh();
        }

        $project  = $clientSub->project;
        $messages = $project ? $project->messages()->with('user')->oldest()->get() : collect();

        $viewName = match($planConf['dashboard'] ?? 'dashboard') {
            'dashboard.marketing' => 'dashboard.marketing',
            'dashboard.ia'        => 'dashboard.ia',
            default               => 'dashboard',
        };

        return view($viewName, compact('project', 'messages', 'planConf', 'clientSub', 'allSubs'));
    })->name('dashboard.plan');

    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});


/*
|--------------------------------------------------------------------------
| 4. ÁREA ADMINISTRATIVA (ADMIN & EMPLOYEES)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Listagem de Projetos (Visão filtrada por Role)

    // Deletar Usuário

    Route::get('/projects', function () {
        $user = auth()->user();

        $projects = $user->role === 'admin'
            ? Project::with(['user', 'employee', 'developers', 'clientSubscription'])->get()
            : Project::where('employee_id', $user->id)
            ->orWhereHas('developers', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->with(['user', 'clientSubscription'])
            ->get();

        $employees = User::where('role', 'employee')->get();

        return view('admin.projects.index', compact('projects', 'employees'));
    })->name('projects.index');

    // Configurações de plano (meta JSON) — marketing, IA, etc.
    Route::post('/projects/{project}/config', function (Request $request, Project $project) {
        $meta = $request->input('meta', []);

        // Normaliza checkboxes (não enviados = false)
        $boolKeys = [
            'channels_meta','channels_google','channels_tiktok','channels_seo','channels_social',
            'module_predictive','module_erp','module_campaigns',
        ];
        foreach ($boolKeys as $k) {
            $meta[$k] = isset($meta[$k]) && $meta[$k] == '1';
        }

        // Mescla com meta existente para não sobrescrever chaves de outros tipos
        $existing = $project->meta ?? [];
        $project->update(['meta' => array_merge($existing, $meta)]);

        return back()->with('success', 'Configurações do plano salvas!');
    })->name('projects.config');

    // Atualização de Projetos
    Route::post('/projects/{project}/update', function (Request $request, Project $project) {
        $data = $request->only(['status', 'preview_url', 'employee_id']);

        // Lógica de progresso dinâmico vs manual
        if ($request->has('steps')) {
            $project->steps = $request->steps;
            $data['steps'] = $request->steps;
            $data['progress'] = $project->dynamic_progress; // Usa o Accessor do Model
        } else {
            $data['progress'] = $request->progress;
        }

        $project->update($data);
        return back()->with('success', 'Protocolo atualizado com sucesso!');
    })->name('projects.update');

    // Gestão de Equipe (Apenas para Super Admin acessar se desejar, ou ambos)
    // GESTÃO DE USUÁRIOS
    Route::get('/users', function () {
        if (auth()->user()->role !== 'admin') abort(403);

        $users = User::with('assignedProjects')->whereIn('role', ['employee', 'client'])->get();
        $projects = Project::all(); // Necessário para o select de associação
        return view('admin.users.index', compact('users', 'projects'));
    })->name('users.index');

    Route::post('/users/store', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:employee,client',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Agente registrado com sucesso!');
    })->name('users.store');

    // NOVA ROTA: UPDATE COMPLETO (Incluso associação de projetos)
    Route::put('/users/{user}', function (Request $request, User $user) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:employee,client',
            'projects' => 'nullable|array',
            'projects.*' => 'exists:projects,id',
            'password' => 'nullable|min:8'
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Sincroniza os projetos na tabela pivot project_user
        if ($user->role === 'employee') {
            $user->assignedProjects()->sync($request->projects ?? []);
        }

        return back()->with('success', 'Perfil do Agente atualizado!');
    })->name('users.update');

    Route::delete('/users/{user}', function (User $user) {
        $user->delete();
        return back()->with('success', 'Usuário removido do sistema.');
    })->name('users.destroy');
});

/*
|--------------------------------------------------------------------------
| 5. ROTAS DE PERFIL (BREEZE) & AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
