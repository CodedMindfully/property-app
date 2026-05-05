TO DO 
Whenever you're ready, fire over the next batch. We can dive into:

Migrations: How the database tables are actually created.

Relationships: How the Property model knows which Admin listed it.
Forms & CSRF: How Laravel protects your "Create Property" page from hackers.
Middleware: How to stop random people from accessing your admin dashboard.

When implementing the property search box use the GET method
because you want the result to be bookmarkable

In Laravel documentation you are told to add a remember_token column of 100 characters. 
This column will be used to store a token for users that select the "remember me" option
when logging into your application. The default users table migration that is included 
in new Laravel applications already contains this column. TALK ABOUT THIS IN RELATION TO 
OUR CURRENT USERS TABLE


 // Use session to remember people
    // Get list of valid people from the admins provider
        'admin' => [
            'driver' => 'session',
            'privider' => 'admins',
        ],
What is a provider?
What is a driver?

What is a standard auth middlewhere and where is it?
My code worked without the auth included in the auth:admin. Why is that?
auth:admin: This is a specialized guard. It says: "Before letting anyone 
see the routes inside this group, check if they are logged in as an ADMIN."
Where does the check happen for taking them back to 
the login page if they aren't logged in?

Is this auth in auth:admin refering to the admin guard in auth file?

In Laravel documentation you are told to add a remember_token column of 100 characters. 
This column will be used to store a token for users that select the "remember me" option
when logging into your application. The default users table migration that is included 
in new Laravel applications already contains this column. In my current table I have a remember_token
token table, I created it when I was coding vanilla style and it was meant to be used for 
instances where a user clicks on remember me. Is this was laravel meant by remember_token? Isn't 
there a different remember_token in the admins table for remembering the admin which is 
distroyed when the admin logs out

I'm confused about how Laravel work. We have covered a few things in Laravel 
I am still confused, I don't understand how things work and we have gone from 
one file to another yet I am confused and can't explain how everything tie together.
I can't write a single line of code in Laravel yet. 


middleware('auth:admin') = Use the built in Auth middleware, insyead of using the 
default web bouncer (guard), use the 'admin' bouncer (guard) I defined in the auth.php


$middleware->redirectGuestsTo(fn() => route('admin.login'));
fn() is an array function. it is a shorthand way to write a one line function.
Its a mini function that you use when you only need to do one small thing and 
don't want to write out the full function (){ return } syntax


1. Your browser sends a GET request to /admin/dashboard

2. Laravel's router opens routes/web.php
   → Finds: Route::get('/dashboard') inside admin prefix group
   → This route has 'admin' middleware attached

3. Before reaching the controller, AdminMiddleware runs
   → Checks: Auth::guard('admin')->check()
   → Are you logged in? 
      → NO  → redirect to admin.login
      → YES → continue

4. Request reaches the controller method

5. Controller asks the Model for data
   → Property::whereNull('deleted_at')->get()
   → Model talks to the database
   → Returns a Collection of Property objects

6. Controller passes data to the view
   → return view('properties.index', compact('properties'))

7. Blade renders the HTML
   → @foreach loops through properties
   → {{ $property->title }} outputs the title

8. HTML is sent back to your browser
8. HTML is sent back to your browser




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
            'exists:property_types, id' = go inside property types table
            id = make sure the number the user sent corresponds to a real record
            exist rule catches it when a someone tries to submit a ramdon id like 999
            that doesn't exist in db
            */
            'property_types'  => ['required', 'exists:property_types, id'], 
            'description'   => ['string', 'nullable'], //Should I remove 'required incase admin doesn't have description yet?
            'bedrooms'  => ['required', 'integer', 'min:0'],
            'bathrooms'  => ['required', 'integer', 'min:0'],
            'floor_size'  => ['required', 'integer', 'min:0'],
            'is_joint_venture'  => ['boolean', 'nullable'],
            'completion_date'   => ['nullable', 'date'],

            //Validate the array of images. This field can be empty
            'images'    => ['nullable', 'array'],
             /* 'images.*' = the * is a wildcard. It tells Laravel to loop through everry
            single item inside the images array and apply these rules to each one individually
            .* looks at individual images rather than looking at the group as a whole.  
            */
            'images.*' => ['image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
            //Validate pdf
            'brochure'  => ['nullable', 'mimes:pdf', 'max:1000'], //10000kb = 10mb
            'features'  => ['required', 'array'],
            'features.*' => ['string', 'max:255']
        ]);


        // Get current authenticated user's id
        //to save this record in the properties table
        $userId = Auth::guard('admin')->user()->id();

    

        // Save pdf and store path
        // If brochure was uploaded
        if($request->hasFile('brochure')){
            // Store it in brochures folder on the public disk 
            $path = $request->file('brochure')->store('brochures', 'public');
        }

        // Process image and store path in filesyste and process entries for db
        if($request->hasFile('images')){
            $files = $request->file('images');
            // loop through the images to set primary image 
            foreach($files as $index => $image){
                // Store each image individually inside the loop
                $path = $image->store('properties', 'public');
                // determine if this is the primary image
                //If index is 0, it means this is the first image in the list
                $isPrimary = ($index === 0);
            }
        }
        

        // Property features 
        foreach($request->features as $featureName){
            if(!empty($featureName)){
                $property->features()->create([
                    'feature' => $featureName
                ]);
            }
        }

        // $validated = $request->validate


        // redirect if successful
        return redirect('admin.properties.index');

    }

}
