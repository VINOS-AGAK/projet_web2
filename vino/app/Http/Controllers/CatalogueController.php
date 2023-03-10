<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catalogue = Catalogue::select()->paginate(15);

        return view('catalogue.index', ['catalogue'=>$catalogue]);
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
     * @param  \App\Models\BouteCatalogueille  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogue $catalogue)
    {
        return view('catalogue.show', ['catalogue'=>$catalogue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        $catalogue = Catalogue::all();

        return view('catalogue.edit', ['catalogue'=>$catalogue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
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


        $catalogue->update([
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
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();

        return redirect(route('catalogue.index'));
    }
}
