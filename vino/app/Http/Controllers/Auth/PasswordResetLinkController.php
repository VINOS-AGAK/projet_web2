<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Affiche la vue pour la demande de lien de réinitialisation du mot de passe.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Gère une demande de lien de réinitialisation de mot de passe entrante.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

         // Nous enverrons le lien de réinitialisation du mot de passe à cet utilisateur.
        // Une fois que nous avons tenté d'envoyer le lien, nous examinerons la réponse puis nous verrons le message que nous devons montrer à l'utilisateur.
        // Enfin, nous enverrons une réponse appropriée.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
