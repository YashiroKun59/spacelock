<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('pages', 'PagesCrudController');
    Route::crud('sliders', 'SlidersCrudController');
    Route::crud('logs', 'LogsCrudController');
    Route::crud('customers', 'CustomersCrudController');
    Route::crud('managers', 'ManagersCrudController');
    Route::crud('prices', 'PricesCrudController');
    Route::crud('options', 'OptionsCrudController');
    Route::crud('spacetypes', 'SpacetypesCrudController');
    Route::crud('roles', 'RolesCrudController');
    Route::crud('sites', 'SitesCrudController');
    Route::crud('spaces', 'SpacesCrudController');
    Route::crud('rentals', 'RentalsCrudController');
    Route::crud('payements', 'PayementsCrudController');
    Route::crud('supports', 'SupportsCrudController');
    Route::crud('configs', 'ConfigsCrudController');
    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file
