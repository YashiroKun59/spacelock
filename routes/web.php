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

Route::controller(MyspaceController::class)->group(function () {
    Route::get('/myspace/{user?}/infos', 'infos')->name('myspace.infos');
    Route::post('/updatecustomer', 'updatecustomer');
    Route::get('/myspace/{user?}/locations', 'locations')->name('myspace.locations');
});

