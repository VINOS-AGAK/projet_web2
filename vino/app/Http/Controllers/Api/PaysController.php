<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBouteilleRequest;
use App\Models\Bouteille;

use Illuminate\Support\Facades\DB;
use App\Models\Catalogue;
use App\Http\Resources\BouteilleResource;
use App\Http\Requests\StoreCellierRequest;

class PaysController extends Controller
{
    public function index(){
        return PaysResource::collection(PaysController::all);
    }
}
