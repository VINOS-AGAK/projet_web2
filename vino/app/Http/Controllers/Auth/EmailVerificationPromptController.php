<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class-contrôleur pour l'affichage de la page de vérification d'adresse e-mail.
 */
class EmailVerificationPromptController extends Controller
{
    /**
     * Affiche la page de vérification d'e-mail.
     *
     * @param Request $request Les données de la requête HTTP.
     * @return RedirectResponse|View
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email');
    }
}
