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
    Route::get('/', 'RolesController@index')->name('roles');
    Route::post('edit', 'RolesController@edit')->name('editRole');
});
Route::prefix('notes')->group(function () {
    Route::get('new', 'NotesController@new')->name('new');
    Route::get('show', 'NotesController@show')->name('show');
    Route::post('create', 'NotesController@create')->name('create');
    Route::post('edit', 'NotesController@edit')->name('edit');
    Route::post('delete', 'NotesController@delete')->name('delete');
});
