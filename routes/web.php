<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\VisitorUserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdmitCardController;




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
Route::get('/',[PostJobController::class,'FrontendIndex'])->name('FrontendIndex'); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('registerto',[VisitorUserController::class,'login'])->name('registerto');
Route::get('loginTo',[VisitorUserController::class,'loginPage'])->name('loginTo');
Route::post('createAccount',[VisitorUserController::class,'Regiterstore'])->name('createAccount');
Route::post('LoginPage',[VisitorUserController::class,'loginUser'])->name('LoginPage');
Route::get('resultlist',[AdmitCardController::class,'listing'])->name('resultlist');




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
	Route::get('destroyPostJob/{id}',[PostJobController::class,'destroy'])->name('deletePostJob'); 
	Route::post('UpdateJobPost/{id}',[PostJobController::class,'update'])->name('UpdateJobPost'); 
	Route::post('UpdateAnnoucement',[PostJobController::class,'UpdateAnnoucement'])->name('UpdateAnnoucement'); 
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('user',[UserController::class,'index'])->name('user'); 
	Route::get('deleteUser/{id}',[UserController::class,'delete'])->name('deleteUser'); 
	Route::get('visitor_user',[VisitorUserController::class,'index'])->name('visitor_user'); 
	Route::get('addvisitor',[VisitorUserController::class,'create'])->name('addvisitor'); 
	Route::post('addvisitoruser',[VisitorUserController::class,'store'])->name('addvisitoruser'); 
	Route::get('destroyvisitoruser/{id}',[VisitorUserController::class,'destroy'])->name('destroyvisitoruser'); 
	Route::get('editvisitoruser/{id}',[VisitorUserController::class,'edit'])->name('editvisitoruser'); 
	Route::post('updatevisitoruser/{id}',[VisitorUserController::class,'update'])->name('updatevisitoruser'); 
	Route::get('notes',[NotesController::class,'index'])->name('notes'); 
	Route::get('AddNotes',[NotesController::class,'create'])->name('AddNotes'); 
	Route::post('AddNotes',[NotesController::class,'store'])->name('AddNotes'); 
	Route::get('Announcement',[AnnouncementController::class,'index'])->name('Announcement'); 
	Route::get('AddPageAnnouncement',[AnnouncementController::class,'create'])->name('AddPageAnnouncement'); 
	Route::post('StoreAnnouncement',[AnnouncementController::class,'store'])->name('AddAnnouncement'); 
	Route::get('deleteannouncemnet/{id}',[AnnouncementController::class,'destroy'])->name('deleteannouncemnet'); 
	Route::get('admidCard',[AdmitCardController::class,'index'])->name('admidCard'); 
	Route::get('Addresult',[AdmitCardController::class,'create'])->name('Addresult'); 
	Route::post('AddResult',[AdmitCardController::class,'store'])->name('AddResult'); 
	Route::get('deleteResult/{id}',[AdmitCardController::class,'destroy'])->name('deleteResult'); 







});

