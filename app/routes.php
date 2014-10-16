<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function(){
    return View::make('index');
});

Route::get('portfolio', function(){
    return View::make('portfolio');
});

Route::get('about', function(){
    return View::make('about');
});

Route::get('contact', function(){
    return View::make('contact');
});

// public routes
Route::resource('artworks', 'ArtworksController', array(
    'only' => array('index', 'show')));
Route::resource('sessions', 'SessionsController', array(
    'only' => array('create', 'store', 'destroy')));
Route::get('login', 'SessionsController@create');

// admin routes
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('/', function(){
	return View::make('admin.dashboard');
    });
    Route::get('dashboard', function(){
	return View::make('admin.dashboard');
    });
    Route::resource('artworks', 'AdminArtworksController', array(
	'except' => 'show'));
});

// View composers. Move this later.
View::composer('layouts.admin', function($view)
{
    $view->with('success', Session::has('success') ? Session::get('success') : false);
});