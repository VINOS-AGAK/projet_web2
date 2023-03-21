<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Models\Bouteille;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\BouteilleHasCellerResource;
use Illuminate\Support\Facades\DB;


class BouteilleHasCellierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          //$user_id = Auth()->user()->id;
          $user_id= 1;
         //$query = $request->input('q');
    
        $bouteilles = DB::table('bouteille__has__cellier')
            ->join('vino__bouteille', 'bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')
              ->where('bouteille__has__cellier.vino__cellier_id', '=', $user_id)
            // ->where(function($q) use ($query) {
            //     $q->where('vino__bouteille.nom', 'LIKE', "%$query%")
            //         ->orWhere('vino__bouteille.pays', 'LIKE', "%$query%")
            //         ->orWhere('vino__bouteille.format', 'LIKE', "%$query%")
            //         ->orWhere('vino__bouteille.prix_saq', 'LIKE', "%$query%");
            // })
            // ->select('bouteille__has__cellier.id', 
            //         'vino__bouteille.nom', 
            //         'vino__bouteille.description', 
            //         'vino__bouteille.image', 
            //         'vino__bouteille.prix_saq' , 
            //         'vino__bouteille.pays' , 
            //         'vino__bouteille.url_saq' , 
            //         'vino__bouteille.format' , 
            //         'vino__bouteille.vino__type_id' , 
            //         'bouteille__has__cellier.created_at'
            //         )
            ->select('bouteille__has__cellier.*', 'vino__bouteille.*')
            ->get();
        return BouteilleHasCellerResource::collection($bouteilles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function show(Bouteille $bouteille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function edit(Bouteille $bouteille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bouteille $bouteille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bouteille $bouteille)
    {
        //
    }
}
