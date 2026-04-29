<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
