<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return auth()->user();
});

Route::post('login', 'API\UserController@login');

Route::post('register', 'API\UserController@register');

// Route::group(['middleware' => ['cors', 'json.response']], function () {
//     // ...
//     // public routes
//     Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
//     Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
//     Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
//
// });

// List all posts
Route::get('posts', 'PostController@index');
// List a single post
Route::get('post/{id}', 'PostController@show');
// Create a new post
Route::post('post', 'PostController@store');
// Update a post
Route::put('post', 'PostController@store');
// Delete a post
Route::delete('post/{id}', 'PostController@destroy');

// List all roles
Route::get('roles', 'RoleController@index');
// List a single role
Route::get('role/{id}', 'RoleController@show');
// Create a new role
Route::post('role', 'RoleController@store');
// Update a role
Route::put('role', 'RoleController@store');
// Delete a role
Route::delete('role/{id}', 'RoleController@destroy');
