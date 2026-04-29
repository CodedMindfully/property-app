<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    //
    public function index(){
        // Get the three of the most recent properties for the home page
        $featuredProperties = Property::whereNull('deleted_at')
                                        ->where('status', 'available')
                                        ->latest()
                                        ->take(3)
                                        ->get();
        return view('pages.home', compact('featuredProperties'));
    }

}
