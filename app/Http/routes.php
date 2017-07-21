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

Route::get('/', 'View\IndexController@index');

/****** 用户操作 ******/
Route::get('/login', 'View\UserController@login');
Route::get('/register','View\UserController@register');
Route::get('service/validate_code/create','Service\ValidateController@create');

Route::post('service/register','Service\UserController@doRegister');



Route::group(['prefix'=>'admin'],function(){
    Route::get('index','Admin\IndexController@index');
    Route::get('welcome','Admin\IndexController@welcome');
    Route::get('login','Admin\IndexController@login');
    
    /****** 首页管理 ******/
    Route::get('homeNav','Admin\HomeNavController@index');
    Route::get('homeNavAdd','Admin\HomeNavController@viewAdd');
    Route::get('homeContent','Admin\HomeController@homeContent');
    
    
    /****** 逻辑操作 ******/
    Route::group(['prefix'=>'service'],function(){
        Route::post('login','Admin\IndexController@doLogin');
        Route::post('addHomeNav','Admin\HomeController@addHomeNav');
        Route::post('login','Admin\IndexController@doLogin');
    });
});