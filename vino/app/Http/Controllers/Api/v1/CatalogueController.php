<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Bouteille;
use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\User;
use App\Http\Resources\CatalogueResource;

// use Dotenv\Validator;
// use Validator;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Bouteille::select()->where("id", "=", "385")->get();
        // return Catalogue::all();
        // collection является статическим методом класса Illuminate\Http\Resources\Json\ResourceCollection, который принимает коллекцию данных и создает экземпляр коллекции ресурсов, который можно возвращать в качестве ответа на запросы API.
        //Коллекции ресурсов обычно используются вместе с контроллерами Laravel, чтобы преобразовывать коллекции моделей в удобный для использования формат данных (JSON, XML и т.д.), который будет возвращен клиенту в ответ на запросы API.
        return CatalogueResource::collection(Catalogue::all());
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
        $validator = Validator::make(
            $request->all(),
            [
                'nom' => ["required"],
                'image' => ["required"],
                'code_saq' => ["required"],
                'pays' => ["required"],
                'description' => ["required"],
                'prix_saq' => ["required"],
                'url_saq' => ["required"],
                'url_img' => ["required"],
                'format' => ["required"],
                'vino__type_id' => ["required"]
            ]
        );
        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->messages = "false post hrenovo"
            ];
        }

        $bouteille = Bouteille::create([

            'nom' => $request->nom,
            'image' => $request->image,
            'code_saq' => $request->code_saq,
            'pays' => $request->pays,
            'description' => $request->description,
            'prix_saq' => $request->prix_saq,
            'url_saq' => $request->url_saq,
            'url_img' => $request->url_img,
            'format' => $request->format,
            'vino__type_id' => $request->vino__type_id

        ]);

        return [
            "status" => true,
            "bouteille" => $bouteille
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
