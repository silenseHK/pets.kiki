<?php

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

Route::get('/','Admin\Index@index')->middleware(['admin_login']);

Route::prefix('admin')->namespace('Admin')->middleware(['admin_login'])->group(function(){
    Route::get('home','Index@home');
    Route::get('button','Index@button');
    Route::get('index','Index@index');
    Route::get('boot','Index@boot');
    Route::get('pet.cate/index','pet\Cate@index');
    Route::get('upload','upload@index');
    Route::post('upload/groupList','upload@uploadGroupList');
    Route::post('upload/uploadList','upload@uploadLists');
});

Route::prefix('admin')->group(function(){
    Route::get('login','Admin\Login@index');
    Route::post('login','Admin\Login@login');
    Route::post('logout','Admin\Login@logout');
});

Route::prefix('api')->group(function(){
    Route::get('test','Api\Message@test');
    Route::get('redis','Api\Message@redis');
    Route::get('queue','Api\Queue@index');
});

Route::get('admin/text',function(){
    return 123;
})->name('admin.index');

//Route::fallback('Admin\Index@home');
