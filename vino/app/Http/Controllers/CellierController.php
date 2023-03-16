<?php

namespace App\Http\Controllers;

use App\Models\Cellier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CellierController extends Controller
{
    /**
     * Display a listing of the resource.
     * retourne la vue du cellier du utilisateur
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::check()) {
            $name = Auth::user()->name;
            $userId = Auth::user()->id;
        }

        return view('cellier.index', ['name' => $name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        if (Auth::check()) {
            $name = Auth()->user()->name;
        }
        
        return view('cellier.create', [ 
            "name" => $name  
        ]);
    }


    /**
     * Add one bottle from the cataloge to the user's cellier
     *
     * @return \Illuminate\Http\Response
     */
    public function ajouterBouteille(Request $request, Cellier $cellier)
    {
        $cellier->bouteille()->attach(['bouteille_id']);

        return redirect()->back()->with('success', 'Bouteille ajoute avec succes!');

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cellier = Cellier::create([
        'nom' => $request->nom,
        'description'=>$request->description,
        'user_id'=> Auth::user()->id
        ]);

        return redirect(route('catalogue', $cellier->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cellier  $cellier
     * @return \Illuminate\Http\Response
     */
    public function show(Cellier $cellier)
    {

        if (Auth::check()) {
            $name = Auth::user()->name;
        }
        return view('cellier.show', [
            'name' => $name,
            'cellier'=>$cellier 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cellier  $cellier
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellier $cellier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cellier  $cellier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cellier $cellier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cellier  $cellier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellier $cellier)
    {
        
    }

}
