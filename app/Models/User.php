<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $uuid
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
 * @property string $remember_token
 * @property integer $signing_count
 * @property string $current_singing_at
 * @property string $last_signing_at
 * @property string $current_signing_ip
 * @property string $last_signing_ip
 * @property string $comment
 * @property boolean $data_collection
 * @property boolean $enabled
 * @property string $stripe_id
 * @property string $pm_type
 * @property string $pm_last_four
 * @property string $trial_ends_at
 * @property integer $role_id
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['uuid', 'lastname', 'firstname', 'address', 'zipcode', 'city', 'phone', 'email', 'password', 'reset_password_token', 'reset_password_send_at', 'remember_create_at', 'remember_token', 'signing_count', 'current_singing_at', 'last_signing_at', 'current_signing_ip', 'last_signing_ip', 'comment', 'data_collection', 'enabled', 'stripe_id', 'pm_type', 'pm_last_four', 'trial_ends_at', 'role_id', 'created_at', 'updated_at'];
}
