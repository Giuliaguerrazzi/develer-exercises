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
//homepage
Route::get('/', 'HomeController@index')->name('home');

Route::get('comments','PublicController@index')->name('comments.index');
Route::get('comments/{slug}','PublicController@show')->name('comments.show');

//rotte per il login
Auth::routes();

//rotte pagine utenti
Route::prefix('admin') //nome della rotta
->namespace('Admin')// dove pescare la rotta
->name('admin.')
->middleware('auth')//rotta protetta da autenticazione
->group(function() {//funzione di callback che definisce le rotte
    
    //home admin
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('comments', 'CommentController');
  

});


// Route::get('/home', 'HomeController@index')->name('home');
