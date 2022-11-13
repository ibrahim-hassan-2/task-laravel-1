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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('file')->group(function () {
    Route::get('lists', "DriveController@index")->name("file.index");
    Route::get('create', "DriveController@create")->name("file.create");
    Route::post('store', "DriveController@store")->name("file.store");
    Route::get('show/{id}', "DriveController@show")->name("file.show");
    Route::get('edit/{id}', "DriveController@edit")->name("file.edit");
    Route::post('update/{id}', "DriveController@update")->name("file.update");
    Route::get('delete/{id}', "DriveController@destroy")->name("file.delete");

});
