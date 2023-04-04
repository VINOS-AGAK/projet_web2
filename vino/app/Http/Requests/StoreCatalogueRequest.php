<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogueRequest extends FormRequest
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
            'vino__type_id'=>'required',
            'nom'=>'required',
            'image'=>'required',
            'code_saq'=>'required',
            'pays'=>'required',
            'description'=>'required',
            'prix_saq'=>'required',
            'url_saq'=>'required',
            'url_img'=>'required',
            'format'=>'required',
        ];
    }
}
