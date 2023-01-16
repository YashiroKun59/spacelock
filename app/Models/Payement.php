<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $rental_id
 * @property string $deadline
 * @property float $amount
 * @property string $stripe_ok
 * @property string $created_at
 * @property string $updated_at
 * @property Rental $rental
 */
class Payement extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['rental_id', 'deadline', 'amount', 'stripe_ok', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rental()
    {
        return $this->belongsTo('App\Models\Rental');
    }
}
