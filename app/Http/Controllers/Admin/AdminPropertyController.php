<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $properties = Property::whereNull('deleted_at')
                                ->orderBy('created_at', 'desc')
                                ->get();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Fetch all property types for the dropdown
        $propertyTypes = PropertyType::all();

        // Pass the statuses constant to the view 
        $statuses = Property::STATUSES;

        return view('admin.properties.create', compact('propertyTypes', 'statuses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Specify validation rule as array 
       $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'location' => ['required', 'string', 'max:255'],
            'status'    => ['required', 'string'],
            /*points to table: property_types , column: id
            'exists:property_types,id' = go inside property types table,
            id = make sure the number the user sent corresponds to a real record
            exist rule catches it when a someone tries to submit a random id like 999
            that doesn't exist in db
            */
            'property_type_id'  => ['required', 'exists:property_types,id'], 
            'description'   => ['string', 'nullable'],
            'bedrooms'  => ['required', 'integer', 'min:0'],
            'bathrooms'  => ['required', 'integer', 'min:0'],
            'floor_size'  => ['required', 'integer', 'min:0'],
            'is_joint_venture'  => ['boolean', 'nullable'],
            'completion_date'   => ['nullable', 'date'],

            //Validate the array of images. This field can be empty
            'images'    => ['nullable', 'array'],
             /* 'images.*' = the * is a wildcard. It tells Laravel to loop through every
            single item inside the images array and apply these rules to each one individually
            .* looks at individual images rather than looking at the group as a whole.  
            */
            'images.*' => ['image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
            //Validate pdf
            'brochure'  => ['nullable', 'mimes:pdf', 'max:1000'], //10000kb = 10mb
            'features'  => ['required', 'array'],
            // Loop through the array of features and apply these validation rules to individual feature
            'features.*' => ['string', 'max:255']
        ]);

        // Database transaction 
        // I'm doing this to ensure laravel saves all data or nothing (in db). This is useful
        //because it prevents half data from being saved to the db. If an image fails other data like 
        //property records gets deleted automatically
        // Use ('use') to pass variable from the outside into the closure
        DB::transaction(function () use($request, $validated){
            $brochurePath = null;
            // Save pdf and store path
            // If brochure was uploaded
            if($request->hasFile('brochure')){
                // Store it in brochures folder on the public disk 
                $brochurePath = $request->file('brochure')->store('brochures', 'public');
            }

            // Save the main property 
            // Capture this in a $property variable so we can use it id for images/features
            $property = Property::create([
                // Get the current admin id
                'admin_id'  => Auth::guard('admin')->user()->id,
                'property_type_id'  => $validated['property_type_id'],
                'title' => $validated['title'],
                'price' => $validated['price'],
                'location' => $validated['location'],
                'status' => $validated['status'],
                'description' => $validated['description'] ?? null,
                'bedrooms' => $validated['bedrooms'],
                'bathrooms' => $validated['bathrooms'],
                'floor_size' => $validated['floor_size'],
                // checkboxes often send on or nothing. $request->has() is a safe way
                //to turn that into a true or false for db
                'is_joint_venture' => $request->has('is_joint_venture'),
                'completion_date' => $validated['completion_date'],
                'brochure_pdf' => $brochurePath,
            ]);

            // Process images and save to images table
            // Process image and store path in filesyste and process entries for db
            if($request->hasFile('images')){
                $files = $request->file('images');
                // loop through the images to set primary image 
                foreach($files as $index => $image){
                    // Store each image individually inside the loop
                    $path = $image->store('properties', 'public');
                    $property->images()->create([
                        'image_path' => $path,
                        // determine if this is the primary image
                        //If index is 0, it means this is the first image in the list
                        'is_primary'    => ($index === 0)
                    ]);

                }
            }

            // process features and save to property_features table
                    // Property features 
            foreach($request->features as $featureName){
                
                if(!empty($featureName)){
                    $property->features()->create([
                        'feature' => $featureName
                    ]);
                }
            }

            // redirect if successful
            return redirect()->route('admin.properties.index')
                            ->with('success', 'Property listed successfully');

        });
        

    }

    /**
     * Handle GET /property/{id}. 
     * I'm using $property as a placehold for $id in the argument
     */
    public function show(Property $property)
    {
        // $propertyType = PropertyType:: 
        /**
         * Use the Route Model Binding way instead of the manual $id 
         * if $id = 999 and it doesn't exist, Laravel handles the 404
         * if $id = abc, it fails the numeric check or fails to find the model
         */
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
