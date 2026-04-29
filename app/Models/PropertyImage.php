<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    //table 
    protected $table = 'property_images';

    protected $fillable = [
        'property_id',
        'image_path',
        'is_primary',
        'sort_order',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}


