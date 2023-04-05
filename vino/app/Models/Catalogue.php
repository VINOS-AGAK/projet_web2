<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Catalogue
 *
 * @package App\Models
 * @property int $id Identifiant du vin dans le catalogue
 * @property int $vino__type_id Identifiant du type de vin dans le catalogue Vino
 * @property string $nom Nom du vin
 * @property string|null $image URL de l'image du vin
 * @property string|null $code_saq Code SAQ du vin
 * @property string|null $pays Pays d'origine du vin
 * @property string|null $description Description du vin
 * @property float|null $prix_saq Prix du vin à la SAQ
 * @property string|null $url_saq URL de la fiche SAQ du vin
 * @property string|null $url_img URL de l'image du vin sur le site SAQ
 * @property string|null $format Format de la bouteille (750 ml, magnum, etc.)
 */
class Catalogue extends Model
{
    const TABLE = 'vino__bouteille';
    
    protected $table = "vino__bouteille";

    use HasFactory;

     /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'vino__type_id',
        'nom',
        'image',
        'code_saq',
        'pays',
        'description',
        'prix_saq',
        'url_saq',
        'url_img',
        'format',
    ];

}
