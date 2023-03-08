<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detail', function () {
    return view('detail');
});

//============================================= CUSTOMAUTHCONTROLLER================================================\\
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('signup', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/signup-store', [CustomAuthController::class, 'store'])->name('user.store');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');









//============================================= CELLIERCONTROLLER ===================================================\\
 
