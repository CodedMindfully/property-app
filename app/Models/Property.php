<?php

namespace App\Models;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PropertyType;
use App\Models\PropertyImage;
use App\Models\PropertyFeature;

class Property extends Model
{
    // Turn on Soft delete
    use SoftDeletes;
    //Tell laravel which table this model uses
    protected $table = "properties";

    // Tell laravel which columns can be filled
    protected $fillable = [
        'title',
        'price',
        'location',
        'status',
        'admin_id',
        'property_type_id',
        'description',
        'bedrooms',
        'bathrooms',
        'floor_size',
        'is_joint_venture',
        'completion_date',
        'brochure_pdf'
    ];


    // Define valid statuses as a constant so I don't keep repeating them in every view
    const STATUSES = [
        'available' => 'Available',
        'sold'      => 'Sold',
        'reserved'  => 'Reserved',
        'off-plan'  => 'Off Plan'
    ];

    // Define the relationship, a property belongs to an admin

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    // Formatted price method. Should return the price without any decimals
    public function getFormattedPriceAttribute(): string{
        return '£' . number_format($this->price, 0);
    }
    // A property belongs to a type
    public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }

    public function features(){
        return $this->hasMany(PropertyFeature::class);
    }
    // A property has many images
    public function images(){
        return $this->hasMany(PropertyImage::class);
    }

    // A property has one primary image
    public function primaryImage(){
        return $this->hasOne(PropertyImage::class)
                    ->where('is_primary', true);
    }

    
}
