<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Affiche la vue de confirmation de mot de passe.
     *
     * @return \Illuminate\View\View
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirme le mot de passe de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
          // Vérifie que le mot de passe fourni par l'utilisateur correspond à son adresse email et à son mot de passe actuel
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            // Si la validation échoue, lance une exception de validation avec un message d'erreur
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Enregistre la date et l'heure de confirmation du mot de passe dans la session
        $request->session()->put('auth.password_confirmed_at', time());

         // Redirige l'utilisateur vers la page d'origine (s'il y en a une) ou vers la page d'accueil
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
