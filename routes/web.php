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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('search', 'SearchController@search')->name('search');
Route::prefix('roles')->group(function () {
    Route::get('/', 'RolesController@index')->name('roles')->middleware('role:Admin');
    Route::post('edit', 'RolesController@edit')->name('editRole')->middleware('role:Admin');
});
Route::prefix('notes')->group(function () {
    Route::get('new', 'NotesController@new')->name('new')->middleware('permission:add notes');
    Route::get('show/{id}', 'NotesController@show')->name('show')->middleware('permission:read notes');
    Route::post('create', 'NotesController@create')->name('create')->middleware('permission:add notes');
    Route::get('edit/{id}', 'NotesController@edit')->name('edit')->middleware('permission:add notes');
    Route::post('delete/{id}', 'NotesController@delete')->name('delete')->middleware('permission:remove notes');
});
