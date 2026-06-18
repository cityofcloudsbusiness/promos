<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::where('role', '!=', 'admin');

        if ($search = $request->input('search')) {
            $query->where(fn($q) => $q
                ->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
            );
        }

        if ($role = $request->input('role')) {
            $query->where('role', $role);
        }

        $users = $query->withCount('enrollments')->latest()->paginate(20)->withQueryString();

        return view('superadmin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'Não é possível alterar o role do Administrador Geral.');
        }

        $request->validate([
            'role' => 'required|in:aluno,professor',
        ]);

        $user->update(['role' => $request->role]);

        $label = $request->role === 'professor' ? 'Professor' : 'Aluno';

        return back()->with('success', "{$user->name} agora é {$label}.");
    }
}
