<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $ip
 * @property string $event_at
 * @property string $event
 * @property string $created_at
 * @property string $updated_at
 */
class Log extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['ip', 'event_at', 'event', 'created_at', 'updated_at'];
}
