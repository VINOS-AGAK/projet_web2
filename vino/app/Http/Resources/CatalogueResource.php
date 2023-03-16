<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatalogueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'nom'=> $this->nom,
            'image'=> $this->image,
            'description'=> substr($this->description, offset:0, length:9),
            'pays'=> $this->pays,
            'prix_saq'=> $this->prix_saq,
            'format'=> $this->format,
        ];
    }
}
