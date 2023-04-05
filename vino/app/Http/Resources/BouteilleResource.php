<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BouteilleResource extends JsonResource
{
    /**
     * Convertit la ressource en tableau associatif.
     *
     * @param Request $request La requête HTTP.
     * @return array Le tableau associatif qui représente la ressource.
     */
    public function toArray(Request $request): array
    {
        // Retourne un tableau qui représente la bouteille, avec ses propriétés correspondantes.
       return [
        'id' => $this->bouteille__has__cellier_id,
        'vino__bouteille_id'=> $this->bouteille__has__cellier_vino__bouteille_id,
        'vino__cellier_id'=> $this->bouteille__has__cellier_vino__cellier_id,
        'date_achat'=> $this->date_achat,
        'nom'=> $this->nom,
        'image'=> $this->image,
        'description'=> substr($this->description, offset:0, length:9),
        'pays'=> $this->pays,
        'prix_saq'=> $this->prix_saq,
        'format'=> $this->format,
        'notes'=>$this->notes,
        'quantite'=>$this->quantite,
    ]; 
    }
}
