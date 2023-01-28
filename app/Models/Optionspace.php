<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $option_id
 * @property integer $space_id
 * @property boolean $available
 * @property Option $option
 * @property Space $space
 */
class Optionspace extends Model
{
    use HasFactory, CrudTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'option_space';

    /**
     * @var array
     */
    protected $fillable = ['available'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo('App\Models\Option');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function space()
    {
        return $this->belongsTo('App\Models\Space');
    }
}
