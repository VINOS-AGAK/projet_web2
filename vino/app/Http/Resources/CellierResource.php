<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * La ressource JSON pour représenter un cellier.
 */
class CellierResource extends JsonResource
{
    /**
     * Convertit la ressource en tableau associatif.
     *
     * @param Request $request La requête HTTP.
     * @return array Le tableau associatif qui représente la ressource.
     */
    public function toArray(Request $request): array
    {

         // Retourne un tableau qui représente le cellier, avec ses propriétés correspondantes.
        return [ 
            'id'=> $this->id,
            'user_id'=> $this->user_id,
            'nom'=> $this->nom,
            'description'=> $this->description,
        ];

    }
}
