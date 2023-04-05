<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Resources\CatalogueResource;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Affiche tous les items de catalogue.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection La collection des catalogues.
     */
    public function index(){
        
        // Récupère tous les bouteilles de catalogue et les transforme en une collection de ressources.
        return CatalogueResource::collection(Catalogue::all());
    }

    /**
     * Crée un nouveau item de catalogue.
     *
     * @param StoreCatalogueRequest $request La requête pour créer le catalogue.
     * @return CatalogueResource Le nouveau catalogue créé.
     */
    public function store(StoreCatalogueRequest $request)
    {
        // Valide la requête et crée une nouvelle bouteiile de catalogue avec les données validées.
        $catalogue = Catalogue::create($request->validated());
        

        // Retourne une ressource qui représente la nouvelle bouteille de catalogue créé.
        return new CatalogueResource($catalogue);
    }

    /**
     * Affiche une bouteiile de catalogue
     *
     * @param Catalogue $catalogue Le catalogue à afficher.
     * @return CatalogueResource Le catalogue demandé.
     */
    public function show(Catalogue $catalogue)
    {
        // Retourne une ressource qui représente la bouteille demandée.
        return new CatalogueResource($catalogue);
    }

    /**
     * Met à jour une bouteille de catalogue spécifique.
     *
     * @param Catalogue $catalogue Le catalogue à mettre à jour.
     * @param StoreCatalogueRequest $request La requête pour mettre à jour le catalogue.
     * @return CatalogueResource Le catalogue mis à jour.
     */
    public function update(Catalogue $catalogue, StoreCatalogueRequest $request)
    {
         // Valide la requête et met à jour la bouteille de catalogue avec les données validées.
        $catalogue->update($request->validated());
        
        // Retourne une ressource qui représente le catalogue mis à jour.
        return new CatalogueResource($catalogue);
    }


    /**
     * Supprime une bouteiile de catalogue 
     *
     * @param Catalogue $catalogue Le catalogue à supprimer.
     * @return \Illuminate\Http\Response La réponse sans contenu.
     */
    public function destroy(Catalogue $catalogue)
    {
        // Supprime la bouteille de catalogue de la base de données.
        $catalogue->delete();
        // Retourne une réponse sans contenu.
        return response()->noContent();
    }
}
