<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


/**
 * Contrôleur pour la gestion de la session d'un utilisateur authentifié.
 */
class AuthenticatedSessionController extends Controller
{
    
     /**
     * Affiche le formulaire de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('login');
    }

     /**
     * Authentifie l'utilisateur et démarre sa session.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(LoginRequest $request)
    {
        // Authentifie l'utilisateur en utilisant la méthode authenticate() du LoginRequest
        $request->authenticate();

         // Régénère la session
        $request->session()->regenerate();

         // Si la requête veut une réponse en JSON, renvoie l'utilisateur authentifié en JSON
        if ($request->wantsJson()){
            return response()->json($request->user());
        }

        
    }

    /**
     * Termine la session de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        // Déconnecte l'utilisateur
        Auth::guard('web')->logout();

        // Invalide la session
        $request->session()->invalidate();

        // Régénère un nouveau jeton CSRF
        $request->session()->regenerateToken();

         // Si la requête veut une réponse en JSON, renvoie une réponse HTTP sans contenu
        if ($request->wantsJson()){
            return response()->noContent();
        }
    }
}
