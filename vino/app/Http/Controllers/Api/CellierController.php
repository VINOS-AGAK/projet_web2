<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCellierRequest;
use App\Http\Resources\CellierResource;
use App\Models\Cellier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Contrôleur pour gérer les opérations CRUD pour les celliers de l'utilisateur connecté.
 */
class CellierController extends Controller
{
     /**
     * Affiche tous les celliers de l'utilisateur connecté.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(){
        // Obtient l'ID de l'utilisateur connecté.
        $user_id = Auth()->user()->id;
        // Récupère tous les celliers de l'utilisateur connecté sous forme de ressources.
        $mesCellier = CellierResource::collection(Cellier::select()->where("vino__cellier.user_id", '=', $user_id)->get());
        return $mesCellier;
    }

    /**
     * Crée un nouveau cellier pour l'utilisateur connecté.
     *
     * @param  StoreCellierRequest  $request
     * @return CellierResource
     */
    public function store(StoreCellierRequest $request)
    {
        // Crée un nouveau cellier avec les données validées de la requête.
        $cellier = Cellier::create($request->validated());

        return new CellierResource($cellier);
    }

    /**
     * Affiche les détails des bouteille d'un cellier spécifique de l'utilisateur connecté.
     *
     * @param  Cellier  $cellier
     * @return array
     */
    public function show(Cellier $cellier)
    {
        // Obtient l'ID du cellier spécifié.
        $id = $cellier->id;
        

        // Récupère toutes les bouteilles de vin pour le cellier spécifié sous forme de tableau associatif.
        $bouteilles = Cellier::select('vino__bouteille.*', 'bouteille__has__cellier.*')
            ->join('bouteille__has__cellier', 'vino__cellier.id', '=', 'bouteille__has__cellier.vino__cellier_id')
            ->join('vino__bouteille', 'bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')
            ->where('vino__cellier.id', '=', $id)
            ->get();

        return ['data' => $bouteilles];
    }

    /**
     * Affiche les détails d'un cellier spécifique de l'utilisateur connecté.
     *
     * @param  Cellier  $cellier
     * @return array
     */
    public function showOneCellier(Cellier $cellier)
    {
        return new CellierResource($cellier);
        
    }

    /**
     * Met à jour un cellier spécifique de l'utilisateur connecté.
     *
     * @param  Cellier  $cellier
     * @param  StoreCellierRequest  $request
     * @return CellierResource
     */
    public function update(Cellier $cellier, StoreCellierRequest $request)
    {
        // Met à jour les données du cellier spécifié avec les données validées de la requête.
        $cellier->update($request->validated());
        

        return new CellierResource($cellier);
    }


     /**
     * Supprime un cellier spécifique de l'utilisateur connecté.
     *
     * @param  Cellier  $cellier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellier $cellier)
    {
        // Supprime le cellier spécifié de la base de données.
        $cellier->delete();

        return response()->noContent();
    }
}
