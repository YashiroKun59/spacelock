<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $rental_id
 * @property integer $user_id
 * @property integer $number
 * @property string $message
 * @property string $send_at
 * @property integer $status
 * @property boolean $from_manager
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property Rental $rental
 * @property User $user
 */
class Support extends Model
{
    use HasFactory, CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['rental_id', 'user_id', 'number', 'message', 'send_at', 'status', 'from_manager', 'enabled', 'created_at', 'updated_at'];

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
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
