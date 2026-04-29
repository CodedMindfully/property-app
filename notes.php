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