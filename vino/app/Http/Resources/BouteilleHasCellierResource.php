<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BouteilleHasCellierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'vino__bouteille_id'=> $this->vino__bouteille_id,
            'vino__cellier_id '=> $this->vino__cellier_id ,
            'date_achat'=>$this->date_achat,
            'garde_jusqua'=> $this->garde_jusqua,
            'notes'=> $this->notes,
            'quantite'=> $this->quantite,
            'millesime'=> $this->millesime,
        ];
    }
}
