<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * La ressource JSON pour représenter un catalogue.
 */
class CatalogueResource extends JsonResource
{
    /**
     * Convertit la ressource en tableau associatif.
     *
     * @param Request $request La requête HTTP.
     * @return array Le tableau associatif qui représente la ressource.
     */
    public function toArray(Request $request): array
    {
        // Retourne un tableau qui représente le catalogue, avec ses propriétés correspondantes.
        return [
            'id'=> $this->id,
            'nom'=> $this->nom,
            'image'=> $this->image,
            'code_saq'=>$this->code_saq,
            'pays'=> $this->pays,
            'description'=> substr($this->description, offset:0, length:9),
            'prix_saq'=> $this->prix_saq,
            'url_saq'=> $this->url_saq,
            'url_img'=> $this->url_img,
            'format'=> $this->format,
            'vino__type_id'=> $this->vino__type_id,
        ];
        // return parent::toArray($request);
    }
}
