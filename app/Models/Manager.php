<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property string $avatar
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
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Role[] $roles
 * @property Site[] $sites
 * @property Support[] $supports
 */
class Manager extends Model
{
    use CrudTrait,HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['lastname', 'firstname', 'avatar', 'phone', 'email', 'password', 'reset_password_token', 'reset_password_send_at', 'remember_create_at', 'signing_count', 'current_singing_at', 'last_signing_at', 'current_signing_ip', 'last_signing_ip', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites()
    {
        return $this->hasMany('App\Models\Site');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supports()
    {
        return $this->hasMany('App\Models\Support');
    }
}
