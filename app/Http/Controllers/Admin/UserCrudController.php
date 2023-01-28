<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'user');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('lastname');
        CRUD::column('firstname');
        CRUD::column('address');
        CRUD::column('zipcode');
        CRUD::column('city');
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('password');
        CRUD::column('reset_password_token');
        CRUD::column('reset_password_send_at');
        CRUD::column('remember_create_at');
        CRUD::column('remember_token');
        CRUD::column('signing_count');
        CRUD::column('current_singing_at');
        CRUD::column('last_signing_at');
        CRUD::column('current_signing_ip');
        CRUD::column('last_signing_ip');
        CRUD::column('comment');
        CRUD::column('data_collection');
        CRUD::column('enabled');
        CRUD::column('stripe_id');
        CRUD::column('pm_type');
        CRUD::column('pm_last_four');
        CRUD::column('trial_ends_at');
        CRUD::column('role_id');
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
        CRUD::setValidation(UserRequest::class);

        CRUD::field('lastname');
        CRUD::field('firstname');
        CRUD::field('address');
        CRUD::field('zipcode');
        CRUD::field('city');
        CRUD::field('phone');
        CRUD::field('email');
        CRUD::field('password');
        CRUD::field('reset_password_token');
        CRUD::field('reset_password_send_at');
        CRUD::field('remember_create_at');
        CRUD::field('remember_token');
        CRUD::field('signing_count');
        CRUD::field('current_singing_at');
        CRUD::field('last_signing_at');
        CRUD::field('current_signing_ip');
        CRUD::field('last_signing_ip');
        CRUD::field('comment');
        CRUD::field('data_collection');
        CRUD::field('enabled');
        CRUD::field('stripe_id');
        CRUD::field('pm_type');
        CRUD::field('pm_last_four');
        CRUD::field('trial_ends_at');
        CRUD::field('role_id');

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
