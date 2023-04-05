<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCellierRequest extends FormRequest
{
   /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
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
            'user_id'=>'required',
            'nom'=>'required',
            'description'=>'required',
        ];
    }
}
