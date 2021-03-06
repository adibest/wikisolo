<?php

use Illuminate\Support\Facades\Route;

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
    return view('welkam');
});

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
//
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/role', function () {
    return view('roles.index');
});

Route::resource('roles', 'RoleController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
