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


Route::get('/admin','Admin\Users@login')->name('admin.login');
Route::post('/admin/logaction','Admin\Users@logaction')->name('admin.logaction');
Route::group(['middleware'=>'userauth'],function(){
    Route::get('/admin/home','Admin\Users@home')->name('admin.home');
    Route::get('/admin/logout','Admin\Users@logout')->name('admin.logout');
    Route::get('/admin/profile','Admin\Users@profile')->name('admin.profile');

    Route::get('/roles','Admin\Roles@report')->name('roles');
    Route::get('/add-role','Admin\Roles@add')->name('role.add');
    Route::post('/save-role','Admin\Roles@save')->name('role.save');
    Route::get('/view-role/{rid}','Admin\Roles@view')->name('role.view');
    Route::get('/edit-role/{rid}','Admin\Roles@edit')->name('role.edit');
    Route::post('/update-role','Admin\Roles@update')->name('role.update');
    Route::get('/delete-role/{rid}','Admin\Roles@delete')->name('role.delete');

    Route::get('/users','Admin\Users@report')->name('users');
    Route::get('/add-user','Admin\Users@add')->name('user.add');
    Route::post('/save-user','Admin\Users@save')->name('user.save');
    Route::get('/view-user/{uid}','Admin\Users@view')->name('user.view');
    Route::get('/edit-user/{uid}','Admin\Users@edit')->name('user.edit');
    Route::post('/update-user','Admin\Users@update')->name('user.update');
    Route::get('/delete-user/{uid}','Admin\Users@delete')->name('user.delete');

    Route::get('/universities','Admin\Universities@index')->name('universities');
    Route::get('/add-university','Admin\Universities@create')->name('university.add');
    Route::post('/save-university','Admin\Universities@store')->name('university.save');
    Route::get('/view-university/{uid}','Admin\Universities@show')->name('university.view');
    Route::get('/edit-university/{uid}','Admin\Universities@edit')->name('university.edit');
    Route::post('/update-university','Admin\Universities@update')->name('university.update');
    Route::get('/delete-university/{uid}','Admin\Universities@destroy')->name('university.delete');
});