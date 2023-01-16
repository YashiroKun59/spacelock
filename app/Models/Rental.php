<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property integer $space_id
 * @property string $start_at
 * @property string $end_at
 * @property integer $bill_period
 * @property string $contrat_url
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Payement[] $payements
 * @property Customer $customer
 * @property Space $space
 * @property Support[] $supports
 */
class Rental extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'space_id', 'start_at', 'end_at', 'bill_period', 'contrat_url', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payements()
    {
        return $this->hasMany('App\Models\Payement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function space()
    {
        return $this->belongsTo('App\Models\Space');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supports()
    {
        return $this->hasMany('App\Models\Support');
    }
}
