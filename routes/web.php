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


Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/artikel', 'ArtikelController@index');
Route::get('/artikel/create', 'ArtikelController@create');
Route::post('/artikel', 'ArtikelController@store');
Route::get('/artikel/{id}/show', 'ArtikelController@show');
Route::get('/artikel/{id}/edit', 'ArtikelController@edit');
Route::put('/artikel/{id}', 'ArtikelController@update');
Route::delete('/artikel/{id}', 'ArtikelController@destroy');
