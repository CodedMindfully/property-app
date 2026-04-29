<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\AdminPropertyController;

// When someone visit the home page, call the index method on PropertyController 
Route::get('/', [PropertyController::class, 'index']);
// Register properties.index nickname to fix VS code complaining 
// that the Route "properties.index" not found
Route::get('properties', [PropertyController::class, 'index'])->name('properties.index'); 

// Single property page.
//The {} tells laravel whatever is in this position of the URL is a variable ($id)
Route::get('/property/{property}', [PropertyController::class, 'show'])
    ->where('property', '[0-9]+') //Only allow numeric ids
    ->missing(function (){ //use the missing() method to intercept the 404 except and display a user friendly alternative
        return redirect()->route('properties.index')
                        ->with('error', "Property not found or has been removed.");
    });



// Featured Properties on Home page 
 Route::get('/', [HomeController::class, 'index']);


// Admin auth routes
// prefix('admin') means every route in this group 
//starts with /admin e.g. /login becomes admin/login
// name('admin.') means every route name starts with admin
Route::prefix('admin')->name('admin.')->group(function(){
    // Public admin routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    // When admin clicks on Login
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

        // Apply Middleware to protect admin routes
        // Before anyone sees the routes inside this group
        //check if they are logged in as Admin
        // Protected route
        Route::middleware('admin')->group(function (){
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

            // All seven property routes in one line 
            // "properties" is a URL base (a slug). The create form will be
            ///admin/properties/create 
            Route::resource('properties', AdminPropertyController::class);
        });
});

    

