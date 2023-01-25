<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property float $lat
 * @property float $lon
 * @property string $description
 * @property string $phone
 * @property string $email
 * @property string $adress
 * @property string $zipcode
 * @property string $city
 * @property string $picture
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Space[] $spaces
 */
class Site extends Model
{
    use HasFactory, CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'lat', 'lon', 'description', 'phone', 'email', 'adress', 'zipcode', 'city', 'picture', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spaces()
    {
        return $this->hasMany('App\Models\Space');
    }
}
