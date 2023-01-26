<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $app_name
 * @property string $app_url
 * @property string $app_mail
 * @property string $app_media
 * @property string $app_theme
 * @property string $app_analytics
 * @property string $app_stripe_token
 * @property string $app_stripe_secret
 * @property string $app_stripe_key
 * @property string $app_currency
 * @property string $created_at
 * @property string $updated_at
 */
class Config extends Model
{
    use HasFactory, CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['app_name', 'app_url', 'app_mail', 'app_media', 'app_theme', 'app_analytics', 'app_stripe_token', 'app_stripe_secret', 'app_stripe_key', 'app_currency', 'created_at', 'updated_at'];
}
