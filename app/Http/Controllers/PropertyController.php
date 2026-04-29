<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //Handles Get /
    public function index(){
        // Eloquent replaces your raw sql, clean, savem readable 
        $properties = Property::whereNull('deleted_at')
                                ->orderBy('created_at', 'desc')
                                ->get();
        // Pass data to the view
        return view('properties.index', compact('properties'));
    }

    // Handles GET /property/{id}. I'm using $property as a placeholder for $id
    public function show(Property $property){
        // find properties or automatically return 404
        // $property = Property::findOrFail($property);
        // Use the Route Model Binding way instead of the manual $id 
        // If ID is 999 and doesn't exist, Laravel handles the 404.
        // If ID is 'abc', it fails the numeric check or fails to find the model.
        return view('properties.show', compact('property'));
    }


}
