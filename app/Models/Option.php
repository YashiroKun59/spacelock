<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property OptionSpace[] $optionSpaces
 */
class Option extends Model
{
    use HasFactory, CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function optionSpaces()
    {
        return $this->hasMany('App\Models\OptionSpace');
    }
}
