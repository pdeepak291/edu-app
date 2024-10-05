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

Route::get('/','Admin\Users@login')->name('admin.login');
Route::post('/admin/logaction','Admin\Users@logaction')->name('admin.logaction');
Route::group(['middleware'=>'userauth'],function(){
    Route::get('/admin/home','Admin\Users@home')->name('admin.home');
    Route::get('/admin/logout','Admin\Users@logout')->name('admin.logout');
    Route::get('/admin/profile','Admin\Users@profile')->name('admin.profile');
    
    Route::get('/settings','Admin\Settings@index')->name('admin.settings');
    Route::post('/settings-update','Admin\Settings@update')->name('settings.update');

    Route::get('/category','Admin\Categories@show')->name('admin.category');
    Route::get('/add-category','Admin\Categories@add')->name('category.add');
    Route::post('/save-category','Admin\Categories@save')->name('category.save');
    Route::get('/edit-category/{rid}','Admin\Categories@edit')->name('category.edit');
    Route::post('/update-category','Admin\Categories@update')->name('category.update');

    Route::get('/types','Admin\Types@report')->name('type');
    Route::get('/add-type','Admin\Types@add')->name('type.add');
    Route::post('/save-type','Admin\Types@save')->name('type.save');
    Route::get('/view-type/{tid}','Admin\Types@view')->name('type.view');
    Route::get('/edit-type/{tid}','Admin\Types@edit')->name('type.edit');
    Route::post('/update-type','Admin\Types@update')->name('type.update');
    Route::get('/delete-type/{tid}','Admin\Types@delete')->name('type.delete');


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
});