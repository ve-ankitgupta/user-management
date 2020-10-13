<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => Helper::allowRegistration()]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::group([], function($route) {
    // check route for authentication
    $route->middleware(['auth'])->group(function () use ($route) {

        // check routes by admin role
        $route->middleware(['role:admin'])->group(function() use ($route) {
            $route->get('users', 'UserController@list')->name('userlist');
            $route->get('users/register', 'UserController@create')->name('registeruser');
            $route->post('users/register', 'UserController@store')->name('registeruser');
            $route->delete('users/{id}', 'UserController@delete')->name('deleteuser');
        });
    });
});
