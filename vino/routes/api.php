<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatalogueController;
use App\Http\Controllers\Api\CellierController;
use App\Http\Controllers\Api\BouteilleHasCellierController;
use App\Http\Controllers\Api\BouteilleController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::apiResource('catalogue', CatalogueController::class);
    Route::apiResource('cellier', CellierController::class);
    Route::apiResource('bouteille', BouteilleController::class);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::apiResource('user', RegisteredUserController::class)->only(['store']);
