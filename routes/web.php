<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user','User\Users@login')->name('user.login');
Route::post('/user/logaction','User\Users@logaction')->name('user.logaction');
Route::get('/user/home','User\Users@home')->name('user.home');
Route::get('/user/logout','User\Users@logout')->name('user.logout');
Route::get('/user/profile','User\Users@profile')->name('user.profile');
