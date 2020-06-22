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
    return $request->user();
});

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
