<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property string $address
 * @property string $zipcode
 * @property string $city
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $reset_password_token
 * @property string $reset_password_send_at
 * @property string $remember_create_at
 * @property integer $signing_count
 * @property string $current_singing_at
 * @property string $last_signing_at
 * @property string $current_signing_ip
 * @property string $last_signing_ip
 * @property string $comment
 * @property boolean $data_collection
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Rental[] $rentals
 */
class Customer extends Model
{
    use CrudTrait,HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['lastname', 'firstname', 'address', 'zipcode', 'city', 'phone', 'email', 'password', 'reset_password_token', 'reset_password_send_at', 'remember_create_at', 'signing_count', 'current_singing_at', 'last_signing_at', 'current_signing_ip', 'last_signing_ip', 'comment', 'data_collection', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentals()
    {
        return $this->hasMany('App\Models\Rental');
    }
}
