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
        $user_id = Auth()->user()->id;
        
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
        return ['data' => $bouteilles];
         //return BouteilleResource::collection($bouteilles);
    

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

        $bouteille = Bouteille::where('vino__bouteille_id', $request->vino__bouteille_id)
                                ->where('vino__cellier_id', $request->vino__cellier_id)
                                ->first();

        if ($bouteille) {
            $bouteille->quantite += $request->quantite;
        } else {
            $bouteille = new Bouteille([
            'vino__bouteille_id' => $request->vino__bouteille_id,
            'vino__cellier_id' => $request->vino__cellier_id,
            'quantite' => $request->quantite,
            ]);
        }

        $bouteille->save();

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
    * @param  \App\Models\Bouteille  $bouteille
    * @return \Illuminate\Http\Response
    */
    public function increment(Bouteille $bouteille)
    {
        $bouteille->quantite += 1;
        $bouteille->save();
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
        if ($bouteille->quantite > 1) {
            $bouteille->quantite -= 1;
            $bouteille->save();
            return response()->json(['success' => true]);
        } else {
            $bouteille->delete();
            return response()->noContent();
        }
    } 

    
}
