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