<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBouteilleRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true; // autorise l'utilisateur à effectuer cette requête
    }

    /**
     * Récupère les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // Définit les règles de validation pour chaque champ de la requête
        return [
            'vino__bouteille_id'=>'required', // L'ID de la bouteille est requis
            'vino__cellier_id'=>'required', // L'ID du cellier est requis
            'quantite'=>'required', // La quantité est requise
        ];
    }
}
