<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $manager_id
 * @property integer $rental_id
 * @property integer $number
 * @property string $message
 * @property string $send_at
 * @property integer $status
 * @property boolean $from_manager
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Rental $rental
 * @property Manager $manager
 */
class Support extends Model
{
    use CrudTrait,HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['manager_id', 'rental_id', 'number', 'message', 'send_at', 'status', 'from_manager', 'enabled', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rental()
    {
        return $this->belongsTo('App\Models\Rental');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo('App\Models\Manager');
    }
}
