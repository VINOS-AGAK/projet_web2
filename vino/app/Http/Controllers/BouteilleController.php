<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use Illuminate\Http\Request;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bouteilles = Bouteille::select()->paginate(15);

        return view('bouteille.index', ['bouteilles'=>$bouteilles]);
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
        return view('bouteille.show', ['bouteille'=>$bouteille]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function edit(Bouteille $bouteille)
    {
        $bouteille = Bouteille::all();

        return view('bouteille.edit', ['bouteille'=>$bouteille]);
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

        $request->validate([
            'type'=> 'required',
            'nom'=> 'required|min:10',
            'image'=> 'required',
            'code_saq'=> 'required',
            'pays'=> 'required',
            'description'=> 'required',
            'prix_saq'=> 'required',
            'url_saq'=> 'required',
            'url_img'=> 'required',
            'format'=> 'required',
        ]);


        $bouteille->update([
            'type'=>$request->type,
            'nom'=>$request->nom,
            'image'=>$request->image,
            'code_saq'=>$request->code_saq,
            'pays'=>$request->pays,
            'description'=>$request->description,
            'prix_saq'=>$request->prix_saq,
            'url_saq'=>$request->url_saq,
            'url_img'=>$request->url_img,
            'format'=>$request->format
        ]);

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

        return redirect(route('bouteille.index'));
    }
}
