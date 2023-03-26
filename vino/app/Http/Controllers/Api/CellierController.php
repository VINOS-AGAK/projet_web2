<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCellierRequest;
use App\Http\Resources\CellierResource;
use App\Models\Cellier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CellierController extends Controller
{
    public function index(){
        $user_id = Auth()->user()->id;
        $mesCellier = CellierResource::collection(Cellier::select()->where("vino__cellier.user_id", '=', $user_id)->get());
        return $mesCellier;
    }

    public function store(StoreCellierRequest $request)
    {
        // dd($request);
        $cellier = Cellier::create($request->validated());

        // $cellier = Cellier::create([
        //     'nom' => $request->nom,
        //     'description'=>$request->description,
        //     'user_id'=> $request->user_id
        //     ]);

        return new CellierResource($cellier);
    }

    public function show(Cellier $cellier, Request $request)
    {
        return new CellierResource($cellier);
    }

    public function update(Cellier $cellier, StoreCellierRequest $request)
    {
        $cellier->update($request->validated());
        

        return new CellierResource($cellier);
    }


    public function destroy(Cellier $cellier)
    {
        $cellier->delete();

        return response()->noContent();
    }
}
