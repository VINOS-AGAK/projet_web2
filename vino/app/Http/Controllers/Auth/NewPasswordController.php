<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

/**
 * Class-contrôleur pour la réinitialisation du mot de passe utilisateur.
 */
class NewPasswordController extends Controller
{
     /**
     * Affiche la vue de réinitialisation de mot de passe.
     *
     * @param Request $request Les données de la requête HTTP.
     * @return View
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Traite une demande de nouveau mot de passe.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @param Request $request Les données de la requête HTTP.
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Ici, nous allons tenter de réinitialiser le mot de passe de l'utilisateur. 
        // Si cela réussit, nous mettrons à jour le mot de passe sur un véritable modèle d'utilisateur et le persisterons dans la base de données.
        //  Sinon, nous analyserons l'erreur et renverrons la réponse.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // Si le mot de passe a été réinitialisé avec succès, nous redirigerons l'utilisateur vers la vue d'accueil de l'application authentifiée.
        //  S'il y a une erreur, nous pouvons les rediriger vers l'endroit d'où ils sont venus avec leur message d'erreur.
         
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
