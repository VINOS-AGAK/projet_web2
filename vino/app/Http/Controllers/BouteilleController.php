<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $name = Auth()->user()->name;
    //     $user_id = Auth()->user()->id;

    //     $bouteilles = DB::table('bouteille__has__cellier')
    //                 ->join('vino__bouteille','bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')
    //                 ->where('bouteille__has__cellier.vino__cellier_id', Auth()->user()->cellier->id)
    //                 ->select('bouteille__has__cellier.id', 
    //                         'vino__bouteille.nom', 
    //                         'vino__bouteille.description', 
    //                         'vino__bouteille.image', 
    //                         'vino__bouteille.prix_saq' , 
    //                         'vino__bouteille.pays' , 
    //                         'vino__bouteille.url_saq' , 
    //                         'vino__bouteille.format' , 
    //                         'vino__bouteille.vino__type_id' , 
    //                         'bouteille__has__cellier.created_at')
    //                 ->get();       
    //     return view('bouteilles_has_cellier.index', ['bouteilles'=>$bouteilles, 'name' => $name ]);
    // }


    public function index(Request $request)
    {
        $name = Auth()->user()->name;
        $user_id = Auth()->user()->id;
        $query = $request->input('q');
        // dd($query);
    
        $bouteilles = DB::table('bouteille__has__cellier')
            ->join('vino__bouteille', 'bouteille__has__cellier.vino__bouteille_id', '=', 'vino__bouteille.id')

            /* OLD */
            // ->where('bouteille__has__cellier.vino__cellier_id', Auth()->user()->cellier->id)
            
            /* NEW */
            ->where('bouteille__has__cellier.vino__cellier_id', '=', $user_id)

            ->where(function($q) use ($query) {
                $q->where('vino__bouteille.nom', 'LIKE', "%$query%")
                    ->orWhere('vino__bouteille.pays', 'LIKE', "%$query%")
                    ->orWhere('vino__bouteille.format', 'LIKE', "%$query%")
                    ->orWhere('vino__bouteille.prix_saq', 'LIKE', "%$query%");
            })
            ->select('bouteille__has__cellier.id', 
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
              
        // dd($bouteilles);

        return view('bouteilles_has_cellier.index', ['bouteilles'=>$bouteilles, 'name' => $name ]);
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth()->user()->id;
        $newBouteille = Bouteille::create([
            'vino__bouteille_id' => $request->id,
            'vino__cellier_id' => $user_id
        ]);

        return redirect()->route('catalogue');
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
        $bouteille->delete();

        return redirect(route('liste-bouteilles'));
    }

    
}
