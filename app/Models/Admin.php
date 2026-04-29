<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Authenticatable tells Laravel this class can login. 
// It adds all the authentication method automatically.
use Illuminate\Foundation\Auth\User as Authenticatable;
// For sending messages to Admins
use Illuminate\Notifications\Notifiable;
/* For Testing and Database Seeding (I can quickly create 20 or more fake Admins 
to test if my search bar works)*/
use Illuminate\Database\Eloquent\Factories\HasFactory;

//extend Authenticatable to work with guards
class Admin extends Authenticatable
{
    //
    protected $table = 'admins';
    // The value expected
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    // Never expose password in JSON responses 
    protected $hidden = [
        'password',
        'remember_token'
    ];

    // Helper method to check if admin is super admin
    public function isSuperAdmin(): bool{
        return $this->role === 'super_admin';
    }
}
