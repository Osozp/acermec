<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCommerceIsActive
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Si es super_admin, pasa sin restricciones
        if ($user && $user->isSuperAdmin()) {
            return $next($request);
        }

        $commerce = $user?->commerce;

        // Si no tiene comercio o su período/suscripción está vencido
        if (!$commerce || !$commerce->hasActiveAccess()) {
            // Redirige a la pantalla de pago o suspensión
            return redirect()->route('subscription.expired');
        }

        return $next($request);
    }
}
