<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/person');
});

Route::resource("/person", PersonController::class);
Route::get("/search", [PersonController::class, 'search']);
Route::get("/fetch", [PersonController::class, 'fetchData']);
