<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Space[] $spaces
 */
class Option extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function spaces()
    {
        return $this->belongsToMany('App\Models\Space');
    }
}
