<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class-contrôleur pour l'envoi de notifications de vérification d'adresse e-mail.
 */
class EmailVerificationNotificationController extends Controller
{
    /**
     * Envoie une nouvelle notification de vérification d'e-mail.
     *
     * @param Request $request Les données de la requête HTTP.
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
