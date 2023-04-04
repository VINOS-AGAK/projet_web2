<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Cellier;

class RegisteredUserController extends Controller
{

    /**
     * Affiche la vue d'enregistrement.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Gère une demande d'enregistrement.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $userId = $user->id;

        // Créer un cellier par défaut pour le nouvel utilisateur
        Cellier::create([
            'nom' => "Cellier nom par defaut",
            'description' => "Cellier description par defaut",
            'user_id' => $userId
        ]);

         // Déclencher l'événement 'Registered' pour l'utilisateur
        event(new Registered($user));

         // Connecter l'utilisateur nouvellement enregistré
        Auth::login($user);

        // Rediriger l'utilisateur vers la page d'accueil
        return redirect(RouteServiceProvider::HOME);
    }
}
