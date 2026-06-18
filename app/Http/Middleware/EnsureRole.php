<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    /**
     * @param  Closure(Request): (Response)  $next
     * @param  string  ...$roles  accepted roles (e.g. 'professor', 'admin')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        foreach ($roles as $role) {
            if ($role === 'professor' && $user->isProfessor()) {
                return $next($request);
            }
            if ($role === 'aluno' && $user->isAluno()) {
                return $next($request);
            }
            if ($role === 'admin' && $user->isAdmin()) {
                return $next($request);
            }
            if ($user->role === $role) {
                return $next($request);
            }
        }

        abort(403, 'Acesso não autorizado.');
    }
}
