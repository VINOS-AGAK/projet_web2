<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBouteilleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'vino__bouteille_id'=>'required',
            'vino__cellier_id'=>'required',
<<<<<<< HEAD
            'date_achat'=>'required',
            'nom'=> 'required',
            'image'=> 'required',
            'description'=> 'required',
            'pays'=>'required',
            'prix_saq'=>'required',
            'format'=> 'required',
=======
            'quantite'=>'required',
>>>>>>> bc29b79a4eceb6a830821b7ad7946f2918cc007b
        ];
    }
}
