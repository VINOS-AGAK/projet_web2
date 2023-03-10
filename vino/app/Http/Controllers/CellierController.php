<?php

namespace App\Http\Controllers;

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
        }
        return view('cellier.index', ['name' => $name]);
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
