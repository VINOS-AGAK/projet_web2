<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\BouteilleController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('bouteille', BouteilleController::class);
Route::resource('auth', CustomAuthController::class);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [CustomAuthController::class, 'login']);
    Route::post('/signin', [CustomAuthController::class, 'signin']);
    Route::post('/logout', [CustomAuthController::class, 'logout']);
    // Route::post('/refresh', [CustomAuthController::class, 'refresh']);
    // Route::get('/user-profile', [CustomAuthController::class, 'userProfile']);
});