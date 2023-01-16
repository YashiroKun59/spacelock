<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $site_id
 * @property integer $spacetype_id
 * @property string $nickname
 * @property string $description
 * @property string $picture
 * @property integer $length
 * @property integer $width
 * @property integer $height
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Option[] $options
 * @property Rental[] $rentals
 * @property Site $site
 * @property Spacetype $spacetype
 */
class Space extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['site_id', 'spacetype_id', 'nickname', 'description', 'picture', 'length', 'width', 'height', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function options()
    {
        return $this->belongsToMany('App\Models\Option');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentals()
    {
        return $this->hasMany('App\Models\Rental');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spacetype()
    {
        return $this->belongsTo('App\Models\Spacetype');
    }
}
