<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ConfigsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ConfigsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ConfigsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Config::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/configs');
        CRUD::setEntityNameStrings('configs', 'configs');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('app_name');
        CRUD::column('app_url');
        CRUD::column('app_mail');
        CRUD::column('app_media');
        CRUD::column('app_theme');
        CRUD::column('app_analytics');
        CRUD::column('app_stripe_token');
        CRUD::column('app_stripe_secret');
        CRUD::column('app_stripe_key');
        CRUD::column('app_currency');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ConfigsRequest::class);

        CRUD::field('app_name');
        CRUD::field('app_url');
        CRUD::field('app_mail');
        CRUD::field('app_media');
        CRUD::field('app_theme');
        CRUD::field('app_analytics');
        CRUD::field('app_stripe_token');
        CRUD::field('app_stripe_secret');
        CRUD::field('app_stripe_key');
        CRUD::field('app_currency');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
