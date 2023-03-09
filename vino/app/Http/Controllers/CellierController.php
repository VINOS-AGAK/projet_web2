<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CellierController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cellier.index');
    }

    public function show()
    {
        return view('cellier.show');
    }

    public function create(){
        //creer un cellier
    }

    public function store(){

    }
}
