<?php

use App\Http\Controllers\MyspaceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function (){
    return view('welcome');
    /*return auth()->user();*/
});

Route::controller(MyspaceController::class)->group(function () {
    Route::get('/myspace/{user?}/infos', 'infos')->name('myspace.infos');
    Route::post('/updatecustomer', 'updatecustomer');
    Route::get('/myspace/{user?}/locations', 'locations')->name('myspace.locations');
});

Route::resource('sliders',App\Http\Controllers\SliderController::class);
Route::resource('pages',App\Http\Controllers\PageController::class);
Route::resource('customers', App\Http\Controllers\CustomerController::class);
Route::resource('payements', App\Http\Controllers\PayementController::class);
Route::resource('spaces', App\Http\Controllers\SpaceController::class);

