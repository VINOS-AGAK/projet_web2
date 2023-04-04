<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Marque l'adresse e-mail de l'utilisateur authentifié comme vérifiée.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Si l'e-mail de l'utilisateur a déjà été vérifié, rediriger vers la page d'accueil avec le paramètre "verified" défini sur 1
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        // Marquer l'e-mail de l'utilisateur comme vérifié et déclencher un événement "Verified" si cela réussit
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

         // Rediriger vers la page d'accueil avec le paramètre "verified" défini sur 1
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
