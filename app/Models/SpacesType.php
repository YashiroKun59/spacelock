<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpacesType extends Model
{
    protected $fillable = [
        'description',
        'enabled',
        'name',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/spaces-types/'.$this->getKey());
    }
}
