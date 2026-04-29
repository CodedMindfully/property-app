<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    //
    protected $table = 'property_features';

    protected $fillable = [
        'property_id',
        'feature',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
