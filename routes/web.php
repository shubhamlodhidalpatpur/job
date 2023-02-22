<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::resource('/addUser', 'App\Http\Controllers\UserController', ['except' => ['create']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('Jobpost',[PostJobController::class,'index'])->name('Jobpost'); 
	Route::get('Addpost',[PostJobController::class,'create'])->name('Addpost'); 
	Route::post('addJobPost',[PostJobController::class,'store'])->name('addJobPost'); 
	Route::get('editPostJob/{id}',[PostJobController::class,'edit'])->name('editPostJob'); 
	Route::post('UpdateJobPost/{id}',[PostJobController::class,'update'])->name('UpdateJobPost'); 
	Route::post('UpdateAnnoucement',[PostJobController::class,'UpdateAnnoucement'])->name('UpdateAnnoucement'); 
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('user',[UserController::class,'index'])->name('user'); 
	Route::get('deleteUser/{id}',[UserController::class,'delete'])->name('deleteUser'); 

});

