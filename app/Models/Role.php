<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Manager[] $managers
 */
class Role extends Model
{
    use CrudTrait,HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['name', 'logo', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function managers()
    {
        return $this->belongsToMany('App\Models\Manager');
    }
}
