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

Route::get('login', function(){
    return View::make('admin/login');
});

/* Dummy pages */
Route::get('single', function(){
    return View::make('single');
});

Route::get('admin', function(){
    return View::make('admin/dashboard');
});

Route::get('admin/artwork', function(){
    return View::make('admin/portfolio');
});

Route::get('admin/artwork/create', function(){
    return View::make('admin/artwork-create');
});