<?php

use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\CatalogueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CellierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [CustomAuthController::class, 'welcome']);
Route::get('/', [CustomAuthController::class, 'welcome'])->name('welcome');
Route::get('/welcome', [CustomAuthController::class, 'welcome']);




//============================================= CUSTOMAUTHCONTROLLER================================================\\
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('signup', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('signup-store', [CustomAuthController::class, 'store'])->name('user.store');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


// //================CELLIER================//
// Route::get('show', [CellierController::class , 'show'])->name('show');
// Route::get('liste', [CellierController::class , 'index'])->name('liste');





Route::get('liste-example', function () {
    return view('liste');
});




//============================================= CELLIERCONTROLLER ===================================================\\
Route::get('cellier-create', [CellierController::class, 'create'])->name('cellier.create');
Route::post('cellier-create', [CellierController::class, 'store'])->name('cellier.store');
Route::get('liste',  [CellierController::class, 'index'])->name('liste');
Route::get('detail', [CellierController::class, 'show'])->name('detail');
Route::get('show', [CellierController::class , 'show'])->name('show');





//============================================= CATALOGUECONTROLLER ===================================================\\
Route::get('catalogue', [CatalogueController::class, 'index'])->name('catalogue');




//============================================= BOUTEILLECONTROLLER ===================================================\\
Route::post('bouteille/{id}', [BouteilleController::class, 'store'])->name('bouteille.store');
Route::get('liste-bouteilles',  [BouteilleController::class, 'index'])->name('liste-bouteilles');
Route::get('details-bouteilles', [BouteilleController::class, 'show'])->name('details-bouteilles');
Route::get('show-bouteilles', [BouteilleController::class , 'show'])->name('show-bouteilles');
Route::delete('bouteille-edit/{bouteille}', [BouteilleController::class, 'destroy'])->name('delete');