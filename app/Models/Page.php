<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $author
 * @property string $description
 * @property string $keywords
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 */
class Page extends Model
{
    use CrudTrait;
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'author', 'description', 'keywords', 'enabled', 'created_at', 'updated_at'];
}
