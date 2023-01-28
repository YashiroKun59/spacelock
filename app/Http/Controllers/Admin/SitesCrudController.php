<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SitesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SitesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SitesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Site::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sites');
        CRUD::setEntityNameStrings('sites', 'sites');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('lat');
        CRUD::column('lon');
        CRUD::column('description');
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('adress');
        CRUD::column('zipcode');
        CRUD::column('city');
        CRUD::column('picture');
        CRUD::column('enabled');
        CRUD::column('manager_id');
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
        CRUD::setValidation(SitesRequest::class);

        CRUD::field('name');
        CRUD::field('description');
        CRUD::field('phone');
        CRUD::field('email');
        CRUD::field('adress');
        CRUD::field('zipcode');
        CRUD::field('city');
        //CRUD::field('picture')->type('upload_multiple')->upload(true);
        $this->crud->addField([
            'name' => 'picture',
            'label' => 'picture',
            'type' => 'upload',
            'upload' => true,
            'disk'=>'public'
        ]);
        CRUD::field('enabled');
        CRUD::field('manager_id');
        CRUD::field('lat');
        CRUD::field('lon');
        $this->crud->addField([
            'name'  => 'position',
            'label' => 'posit',
            'type'  => 'position',
        ]);


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
