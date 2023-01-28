<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyspaceController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\OrderController;
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

Route::controller(WelcomeController::class)->group(function(){
        Route::get('/','indexGuest');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home/locations', 'locations')->name('myspace.locations');
    Route::get('/home', 'index')->name('myspace');
    Route::post('/updatecustomer', 'update_customer')->name('myspace.updatecustomer');
});

Route::controller(SpaceController::class)->group(function(){
    Route::get('/catalog/{SiteId?}','indexGuest')->name('catalog.index');
    Route::get('/catalog/{SiteId}/{space?}','showGuest')->name('catalog.show');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/space/orderTwo','order_two')->name('orderTwo');
    Route::post('/space/orderThree','order_three')->name('orderThree');
    Route::post('/space/orderFour','order_four')->name('orderFour');
    Route::post('/space/orderFive','order_five')->name('orderFive');
});

Route::controller(SiteController::class)->group(function(){
    Route::get('/api/listsites.json', 'indexGuest')->name('sites.json');
});

Auth::routes();
