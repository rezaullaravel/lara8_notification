<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

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

//user route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','user'])->name('home');


//admin route
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/profile',[DashboardController::class,'index']);


    //show notification
    Route::get('/show/notification',[NotificationController::class,'showNotification'])->name('show.notification');
    Route::get('/mark-as/read/{id}',[NotificationController::class,'markAsRead'])->name('markasread');
});


