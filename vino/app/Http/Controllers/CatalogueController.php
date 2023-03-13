<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Suuport\Facades\Session;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $catalogue = Catalogue::select()->paginate(10);
            $name = Auth()->user()->name;
            return view('catalogue.index', ['catalogue'=>$catalogue,'name' => $name ]);
        }else{
            $catalogue = Catalogue::select()->paginate(10);
            $name = "guest";
            return view('catalogue.index', ['catalogue'=>$catalogue,'name' => $name ]);
        }

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

    /**
     * Recherche dans catalogue saq
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        if(Auth::check()){
            $name = Auth::user()->name;
            $catalogue = Catalogue::where('nom', 'LIKE', "%$query%")
                                   ->orWhere('pays', 'LIKE', "%$query%")
                                   ->orWhere('description', 'LIKE', "%$query%")
                                   ->orWhere('prix_saq', 'LIKE', "%$query%")
                                   ->orWhere('format', 'LIKE', "%$query%")
                                   ->paginate(5);
            return view('catalogue.index', ['catalogue' => $catalogue, 'name' => $name]);                      
        } else {
            $catalogue = Catalogue::where('nom', 'LIKE', "%$query%")
                                   ->orWhere('pays', 'LIKE', "%$query%")
                                   ->orWhere('description', 'LIKE', "%$query%")
                                   ->orWhere('prix_saq', 'LIKE', "%$query%")
                                   ->orWhere('format', 'LIKE', "%$query%")
                                   ->paginate(5);
        
            return view('catalogue.index', ['catalogue' => $catalogue]);
        }
    }
}
