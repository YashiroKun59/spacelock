<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property float $amount
 * @property float $tax
 * @property string $start_date_at
 * @property string $end_date_at
 * @property float $discount_percent
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Space[] $spaces
 */
class Price extends Model
{
    use HasFactory, CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['amount', 'tax', 'start_date_at', 'end_date_at', 'discount_percent', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spaces()
    {
        return $this->hasMany('App\Models\Space');
    }
}
