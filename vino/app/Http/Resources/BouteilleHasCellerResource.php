<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BouteilleHasCellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // $bouteille = DB::table('bouteille__has__cellier')
        // ->join('vino__bouteille', )

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
