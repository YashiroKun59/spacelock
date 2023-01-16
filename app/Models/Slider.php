<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $media
 * @property string $uri
 * @property boolean $timelaps
 * @property string $start_at
 * @property string $end_at
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 */
class Slider extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'media', 'uri', 'timelaps', 'start_at', 'end_at', 'enabled', 'created_at', 'updated_at'];
}
