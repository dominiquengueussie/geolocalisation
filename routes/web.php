<?php

use App\Http\Controllers\GeolocalisationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/geolocal', [GeolocalisationController::class, 'index']);
Route::post('geolocal/store', [GeolocalisationController::class, 'store'])->name('store');
Route::get('/geolocal/{id}', [GeolocalisationController::class, 'show'])->name('geolocal.show');


Route::get('/', function () {
    return view('welcome');
});
