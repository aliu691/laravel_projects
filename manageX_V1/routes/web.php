<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\AdminLoginController;

//use App\Http\Controllers\OppurtunityController;


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
})->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::get('/createOppurtunityForm', ['uses' => OppurtunityController::class], 'createOppurtunityForm')->name('createOppurtunityForm');

//this method is used because auth is used in the laravel
Route::get('/createOppurtunityForm', ['uses' => 'App\Http\Controllers\OppurtunityController@createOppurtunityForm'])->name('createOppurtunityForm');





//admin routes

Route::get('/admin/login', [AdminLoginController::class, 'showAdminLoginForm'])->name('adminLogin');

//authenticate the admin

Route::post('/admin/login', [AdminLoginController::class, 'authenticate'])->name('authenticate');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('adminLogout');