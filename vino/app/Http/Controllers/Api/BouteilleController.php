<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBouteilleRequest;
use App\Models\Bouteille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalogue;
use App\Http\Resources\BouteilleResource;
use App\Http\Requests\StoreCellierRequest;


class BouteilleController extends Controller
{
    /**
     * Afficher une liste de bouteilles dans cellier.
     *
     * @return array
     */
    public function index()
    {
        //obtenir le id d’utilisateur autorisé dans le système
        $user_id = Auth()->user()->id;

        //obtenir des données des bouteilles dans le cellier d’utilisateur
        $bouteilles = DB::table('bouteille__has__cellier')
            ->join('vino__bouteille', 'bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')
            ->where('bouteille__has__cellier.vino__cellier_id', '=', $user_id)
            ->select(    'bouteille__has__cellier.id', 
                         'bouteille__has__cellier.quantite', 
                         'bouteille__has__cellier.notes', 
                         'vino__bouteille.nom', 
                         'vino__bouteille.description', 
                         'vino__bouteille.image', 
                         'vino__bouteille.prix_saq' , 
                         'vino__bouteille.pays' , 
                         'vino__bouteille.url_saq' , 
                         'vino__bouteille.format' , 
                         'vino__bouteille.vino__type_id' , 
                        'bouteille__has__cellier.created_at')
            ->get();

        // $bouteilles = Bouteille::all(); 
        
        //retourne les données dans le format du tableau
        return ['data' => $bouteilles];
         
    

    }

    /**
     * Montrez le formulaire pour créer une nouvelle ressource.
     */
    public function create()
    {
        //
    }

    /**
     * Stocker une bouteiile nouvellement créée dans le stockage.
     *
     * @param  \App\Http\Requests\StoreBouteilleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBouteilleRequest $request)
    {
        // $bouteille = Bouteille::create($request->validated());
        // return new BouteilleResource($bouteille);

        //créer une nouvelle bouteille dans cellier
        // Chercher si la bouteille existe déjà dans le cellier.
        $bouteille = Bouteille::where('vino__bouteille_id', $request->vino__bouteille_id)
                                ->where('vino__cellier_id', $request->vino__cellier_id)
                                ->first();

        if ($bouteille) {

            // Si la bouteille existe, ajouter la quantité de la nouvelle bouteille à la quantité existante.
            $bouteille->quantite += $request->quantite;
        } else {
            $bouteille = new Bouteille([
            'vino__bouteille_id' => $request->vino__bouteille_id,
            'vino__cellier_id' => $request->vino__cellier_id,
            'quantite' => $request->quantite,
            ]);
        }

        // Sauvegarder la bouteille dans la base de données.
        $bouteille->save();

        // Rediriger l'utilisateur vers la page précédente.
        return redirect()->back();
        
    
    }

    /**
     * Affiche la bouteiile spécifiée.
     */
    public function show(Bouteille $bouteille)
    {
        //
    }

    /**
     * Montrez le formulaire pour éditer la bouteiile .
     */
    public function edit(Bouteille $bouteille)
    {
        //
    }

    /**
    * Mettre à jour la bouteiile spécifiée dans le stockage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Bouteille  $bouteille
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Bouteille $bouteille)
    {
        $bouteille->update($request->validated());
        return new BouteilleResource($bouteille);
    }

    /**
    * Retirer la bouteiile spécifiée du stockage.
    *
    * @param  \App\Models\Bouteille  $bouteille
    * @return \Illuminate\Http\Response
    */
    public function destroy(Bouteille $bouteille)
    {
        
        $bouteille->delete();
        return response()->noContent();
    }

    /**
    * Incrémenter la quantité de la bouteille spécifiée dans le stockage.
    *
    * @param  \App\Models\Bouteille  $bouteille -- L'objet Bouteille à modifier
    * @return \Illuminate\Http\Response
    */
    public function increment(Bouteille $bouteille)
    {
        // Incrémenter la quantité de la bouteille de 1
        $bouteille->quantite += 1;
        // Enregistrer les changements en base de données
        $bouteille->save();
        // Renvoyer une réponse JSON indiquant que l'opération a réussi
        return response()->json(['success' => true]);
    }

    // public function decrement(Bouteille $bouteille)
    // {
    //     $bouteille->quantite +=  -1;
    //     $bouteille->save();
    //     return response()->json(['success' => true]);
    // }

    /**
    * Décrémenter la quantité de la bouteiile spécifiée en stockage.
    *
    * @param  \App\Models\Bouteille  $bouteille
    * @return \Illuminate\Http\Response
    */
    public function decrement(Bouteille $bouteille){
        //Si la quantité de la bouteille est supérieure à 1
        if ($bouteille->quantite > 1) {
            //Décrémenter la quantité par 1 et enregistrer les modifications
            $bouteille->quantite -= 1;
            $bouteille->save();
            return response()->json(['success' => true]);
        } else {
            //Si la quantité est moins de 1, supprimer la bouteille de la base de données
            $bouteille->delete();
            return response()->noContent();
        }
    } 

    public function changeNote(Bouteille $bouteille, Request $request)
    {
        // dd($request);
        $bouteille->notes = $request->notes;
        $bouteille->save();
        return response()->json(['success' => true]);
    }
}
