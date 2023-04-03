<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Bouteille
 *
 * @package App\Models
 * @property int $id
 * @property int $vino__bouteille_id Identifiant de la bouteille dans le catalogue Vino
 * @property int $vino__cellier_id Identifiant du cellier où se trouve la bouteille
 * @property string $date_achat Date d'achat de la bouteille
 * @property string|null $garde_jusqua Date jusqu'à laquelle la bouteille doit être conservée
 * @property string|null $notes Notes concernant la bouteille
 * @property int $quantite Quantité de bouteilles
 * @property int|null $millesime Millésime de la bouteille
 * @property Catalogue $catalogue Catalogue de Vino
 * @property Cellier[] $cellar Liste des celliers où se trouve la bouteille
 * @property User[] $users Liste des utilisateurs qui ont la bouteille dans leur collection
 */
class Bouteille extends Model
{
    protected $table = "bouteille__has__cellier";
    use HasFactory;

     /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'vino__bouteille_id',
        'vino__cellier_id',
        'date_achat',
        'garde_jusqua',
        'notes',
        'quantite',
        'millesime',
    ];

    /**
     * Obtenez le catalogue qui possède la bouteille.
     */
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);    
    }    

    /**
     * Les celliers auxquels la bouteille appartient.
     */
    public function cellar()
    {
        return $this->belongsToMany(Cellier::class, 'bouteille__has__cellier')
                        ->withPivot([
                            'id',
                            'quantite',
                            'notes',
                            'created_at',
                            'updated_at'
                        ]);
    }

    /**
     * Les utilisateurs qui possèdent la bouteille.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
                        ->withPivot('quantite', 'notes')
                        ->withTimestamps();
    }
}
