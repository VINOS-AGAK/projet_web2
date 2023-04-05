<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Mettre à jour le mot de passe de l'utilisateur.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        // On valide les champs du formulaire de mise à jour de mot de passe.
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // On met à jour le mot de passe de l'utilisateur.
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // On redirige l'utilisateur vers la page précédente avec un message de confirmation.
        return back()->with('status', 'password-updated');
    }
}
