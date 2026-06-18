<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Aluno;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ── Landing Page & Área pública ─────────────────────────────────────────────
Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/gestao-pessoas', fn () => view('areas.gestao-pessoas'))->name('areas.gestao-pessoas');
Route::get('/ia',             fn () => view('areas.ia'))->name('areas.ia');
Route::get('/tecnologia',     fn () => view('areas.tecnologia'))->name('areas.tecnologia');
Route::get('/logistica',      fn () => view('areas.logistica'))->name('areas.logistica');
Route::get('/gestao',         fn () => view('areas.gestao'))->name('areas.gestao');

// ── Redirecionamento genérico do /dashboard (Breeze default) ─────────────────
Route::middleware(['auth', 'verified'])->get('/dashboard', function (Request $request) {
    $user = $request->user();
    return match (true) {
        $user->isAdmin()     => redirect()->route('superadmin.dashboard'),
        $user->isProfessor() => redirect()->route('admin.dashboard'),
        default              => redirect()->route('aluno.dashboard'),
    };
})->name('dashboard');

// ── Perfil (Breeze) ───────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ── Área Administrativa (Professor / Admin) ───────────────────────────────────
Route::middleware(['auth', 'verified', 'role:professor,admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        // Formações CRUD
        Route::resource('formacoes', Admin\FormacaoController::class);

        // Solicitações de acesso
        Route::get('solicitacoes',                        [Admin\AccessRequestController::class, 'index'])->name('access-requests.index');
        Route::patch('solicitacoes/{accessRequest}/approve', [Admin\AccessRequestController::class, 'approve'])->name('access-requests.approve');
        Route::patch('solicitacoes/{accessRequest}/reject',  [Admin\AccessRequestController::class, 'reject'])->name('access-requests.reject');

        // Cursos CRUD
        Route::resource('courses', Admin\CourseController::class);

        // Módulos (nested em courses)
        Route::prefix('courses/{course}')->name('courses.')->group(function () {
            Route::post('modules',                               [Admin\ModuleController::class, 'store'])->name('modules.store');
            Route::patch('modules/{module}',                    [Admin\ModuleController::class, 'update'])->name('modules.update');
            Route::delete('modules/{module}',                   [Admin\ModuleController::class, 'destroy'])->name('modules.destroy');

            // Aulas (nested em modules)
            Route::get('modules/{module}/lessons/create',       [Admin\LessonController::class, 'create'])->name('modules.lessons.create');
            Route::post('modules/{module}/lessons',             [Admin\LessonController::class, 'store'])->name('modules.lessons.store');
            Route::get('modules/{module}/lessons/{lesson}/edit', [Admin\LessonController::class, 'edit'])->name('modules.lessons.edit');
            Route::patch('modules/{module}/lessons/{lesson}',          [Admin\LessonController::class, 'update'])->name('modules.lessons.update');
            Route::patch('modules/{module}/lessons/{lesson}/reorder', [Admin\LessonController::class, 'reorder'])->name('modules.lessons.reorder');
            Route::delete('modules/{module}/lessons/{lesson}',        [Admin\LessonController::class, 'destroy'])->name('modules.lessons.destroy');
        });
    });

// ── Área Super Admin (Admin Geral) ───────────────────────────────────────────
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        Route::get('/', [SuperAdmin\DashboardController::class, 'index'])->name('dashboard');

        // Gestão de Usuários
        Route::get('usuarios',                       [SuperAdmin\UserController::class, 'index'])->name('users.index');
        Route::patch('usuarios/{user}/role',         [SuperAdmin\UserController::class, 'updateRole'])->name('users.updateRole');

        // Gestão de Cursos (atribuição de professor e área)
        Route::get('cursos',                         [SuperAdmin\CourseAssignmentController::class, 'index'])->name('courses.index');
        Route::patch('cursos/{course}/instructor',   [SuperAdmin\CourseAssignmentController::class, 'updateInstructor'])->name('courses.updateInstructor');
        Route::patch('cursos/{course}/area',         [SuperAdmin\CourseAssignmentController::class, 'updateArea'])->name('courses.updateArea');
    });

// ── PDF Apostila (autenticado, todos os papéis) ───────────────────────────────
Route::middleware(['auth', 'verified'])
    ->get('/apostilas/{lesson}', [Aluno\PdfController::class, 'serve'])
    ->name('apostila.serve');

// ── Área do Aluno ─────────────────────────────────────────────────────────────
Route::middleware(['auth', 'verified', 'role:aluno'])
    ->prefix('minha-area')
    ->name('aluno.')
    ->group(function () {
        Route::get('/', [Aluno\DashboardController::class, 'index'])->name('dashboard');

        // Solicitação de acesso
        Route::post('solicitar-acesso', [Aluno\AccessRequestController::class, 'store'])->name('access-request.store');

        // Player de vídeo
        Route::get('cursos/{course}',                  [Aluno\PlayerController::class, 'show'])->name('player');
        Route::get('cursos/{course}/aulas/{lesson}',   [Aluno\PlayerController::class, 'show'])->name('player.lesson');
        Route::post('aulas/{lesson}/progresso',        [Aluno\PlayerController::class, 'markProgress'])->name('progress');
    });

require __DIR__.'/auth.php';
