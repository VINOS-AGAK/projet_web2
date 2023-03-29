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
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth()->user()->id;
        
       // $query = 'q';
    
        // $bouteilles = DB::table('bouteille__has__cellier')
        //     ->join('vino__bouteille', 'bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')
        //     ->where('bouteille__has__cellier.vino__cellier_id', '=', $user_id)

        //     ->where(function($q) use ($query) {
        //         $q->where('vino__bouteille.nom', 'LIKE', "%$query%")
        //             ->orWhere('vino__bouteille.pays', 'LIKE', "%$query%")
        //             ->orWhere('vino__bouteille.format', 'LIKE', "%$query%")
        //             ->orWhere('vino__bouteille.prix_saq', 'LIKE', "%$query%");
        //     })
        //     ->select('bouteille__has__cellier.id', 
        //             'vino__bouteille.nom', 
        //             'vino__bouteille.description', 
        //             'vino__bouteille.image', 
        //             'vino__bouteille.prix_saq' , 
        //             'vino__bouteille.pays' , 
        //             'vino__bouteille.url_saq' , 
        //             'vino__bouteille.format' , 
        //             'vino__bouteille.vino__type_id' , 
        //             'bouteille__has__cellier.created_at')
        //     ->get();
        $bouteilles = DB::table('bouteille__has__cellier')
            ->join('vino__bouteille', 'bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')
            ->where('bouteille__has__cellier.vino__cellier_id', '=', $user_id)
            ->select(    'bouteille__has__cellier.id', 
            'bouteille__has__cellier.quantite', 
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBouteilleRequest $request)
    {
        $bouteille = Bouteille::create($request->validated());

        return new BouteilleResource($bouteille);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bouteille $bouteille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bouteille $bouteille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bouteille $bouteille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bouteille $bouteille)
    {
        
        $bouteille->delete();
        return response()->noContent();
    }
}
