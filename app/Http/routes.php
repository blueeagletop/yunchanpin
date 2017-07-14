<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// use App\ORM\HomeNav;

Route::get('/', function () {
    return view('index');
    // return HomeNav::all(); //使用了HomeNav就要先引用"use"
});

/****** 用户操作 ******/
Route::get('/login', 'View\UserController@Login');
Route::get('/register','View\UserController@Register');
Route::any('service/validate_code/create','Service\ValidateController@create');
Route::any('service/register','Service\UserController@register');