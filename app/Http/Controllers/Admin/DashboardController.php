<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Property;

class DashboardController extends Controller
{
    //
    public function index(){
        $totalProperties = Property::count();
        return view('admin.dashboard', ['propertiesCount'=>$totalProperties]);
    }
}
