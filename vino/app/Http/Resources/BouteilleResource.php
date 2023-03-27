<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BouteilleResource extends JsonResource
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
        'vino__bouteille_id'=> $this->vino__bouteille_id,
        'vino__cellier_id'=> $this->vino__cellier_id,
        'date_achat'=> $this->date_achat,
        
        'nom'=> $this->nom,
        'image'=> $this->image,
        'description'=> substr($this->description, offset:0, length:9),
        'pays'=> $this->pays,
        'prix_saq'=> $this->prix_saq,
        'format'=> $this->format,
    ]; 
    }
}
