<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessRequest;
use App\Models\Enrollment;
use App\Models\FormacaoEnrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AccessRequestController extends Controller
{
    public function index(): View
    {
        $pending = AccessRequest::with(['user', 'course', 'formacao'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(20);

        $recent = AccessRequest::with(['user', 'course', 'formacao', 'reviewer'])
            ->whereIn('status', ['approved', 'rejected'])
            ->latest('reviewed_at')
            ->take(10)
            ->get();

        $pendingCount = AccessRequest::where('status', 'pending')->count();

        return view('admin.access-requests.index', compact('pending', 'recent', 'pendingCount'));
    }

    public function approve(AccessRequest $accessRequest): RedirectResponse
    {
        if (!$accessRequest->isPending()) {
            return back()->with('error', 'Esta solicitação já foi processada.');
        }

        DB::transaction(function () use ($accessRequest) {
            if ($accessRequest->course_id) {
                Enrollment::firstOrCreate(
                    ['user_id' => $accessRequest->user_id, 'course_id' => $accessRequest->course_id],
                    ['enrolled_at' => now()]
                );
            }

            if ($accessRequest->formacao_id) {
                FormacaoEnrollment::firstOrCreate(
                    ['user_id' => $accessRequest->user_id, 'formacao_id' => $accessRequest->formacao_id],
                    ['enrolled_at' => now(), 'plan_type' => 'free']
                );

                // Enroll in all courses of the formação
                $formacao = $accessRequest->formacao()->with('courses')->first();
                foreach ($formacao->courses as $course) {
                    Enrollment::firstOrCreate(
                        ['user_id' => $accessRequest->user_id, 'course_id' => $course->id],
                        ['enrolled_at' => now()]
                    );
                }
            }

            $accessRequest->update([
                'status'      => 'approved',
                'reviewed_by' => auth()->id(),
                'reviewed_at' => now(),
            ]);
        });

        return back()->with('success', "Acesso aprovado para {$accessRequest->user->name}.");
    }

    public function reject(AccessRequest $accessRequest): RedirectResponse
    {
        if (!$accessRequest->isPending()) {
            return back()->with('error', 'Esta solicitação já foi processada.');
        }

        $accessRequest->update([
            'status'      => 'rejected',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return back()->with('success', "Solicitação de {$accessRequest->user->name} rejeitada.");
    }
}
