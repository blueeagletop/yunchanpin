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


/****************** 用户后台 ******************/
Route::group(['prefix'=>'user'],function(){
    Route::get('index','User\IndexController@index');
    Route::get('welcome','User\IndexController@welcome');
});

/****************** 管理员后台 ******************/
Route::group(['prefix'=>'admin'],function(){
    Route::get('index','Admin\IndexController@index');
    Route::get('welcome','Admin\IndexController@welcome');
    Route::get('login','Admin\IndexController@login');
    
    /****** 首页导航 ******/
    Route::get('homeNav','Admin\HomeNavController@index');
    Route::get('homeNavAdd','Admin\HomeNavController@viewAdd');
    Route::get('homeNavEdit={nav_id}','Admin\HomeNavController@viewEdit');
    /****** 首页内容 ******/
    Route::get('homeContent','Admin\HomeContentController@homeContent');
    Route::get('homeContentAdd','Admin\HomeContentController@addHomeContent');
    Route::get('editHomeContent={content_id}','Admin\HomeContentController@editHomeContent');
    /****** 新闻 ******/
    Route::get('news','Admin\NewsController@news');
    Route::get('newsDetail={news_id}','Admin\NewsController@newsDetail');
    Route::get('addNews','Admin\NewsController@addNews');
    Route::get('editNews={content_id}','Admin\NewsController@editNews');
    /****** 公告 ******/
    Route::get('affiche','Admin\AfficheController@affiche');
    Route::get('addAffiche','Admin\AfficheController@addAffiche');
    Route::get('editAffiche={affiche_id}','Admin\AfficheController@editAffiche');
    Route::get('afficheDetail={affiche_id}','Admin\AfficheController@afficheDetail');
    /****** 网站列表 ******/
    Route::get('webTemplet','Admin\WebTempletController@webTemplet');
    Route::get('addWebTemplet','Admin\WebTempletController@addWebTemplet');
    Route::get('editWebTemplet={templet_id}','Admin\WebTempletController@editWebTemplet');
    /******* 订单分类 *******/
    Route::get('orderCategory','Admin\OrderCategoryController@orderCategory');
    Route::get('addOrderCategory','Admin\OrderCategoryController@addOrderCategory');
    Route::get('editOrderCategory={category_id}','Admin\OrderCategoryController@editOrderCategory');
    /******* 订单列表 *******/
    Route::get('order','Admin\OrderController@order');
    Route::get('addOrder','Admin\OrderController@addOrder');
    Route::get('editOrder={order_id}','Admin\OrderController@editOrder');
    /******* 售后服务 *******/
    Route::get('untreatedApply','Admin\UserApplyController@untreatedApply');
    Route::get('finishApply','Admin\UserApplyController@finishApply');
    Route::get('cutOutApply','Admin\UserApplyController@cutOutApply');
    /******* 留言管理 *******/
    Route::get('untreatedAdvise','Admin\UserAdviseController@untreatedAdvise');
    Route::get('finishAdvise','Admin\UserAdviseController@finishAdvise');
    Route::get('cutOutAdvise','Admin\UserAdviseController@cutOutAdvise');
    /******* 用户管理 *******/
    Route::get('user','Admin\UserController@user');
    Route::get('cutOutUser','Admin\UserAdviseController@cutOutUser');
    /******* 管理员 *******/
    Route::get('admin','Admin\AdminController@admin');
    
    /****************************** 操作数据库 ******************************/
    Route::group(['prefix'=>'service'],function(){
        Route::post('login','Admin\IndexController@doLogin');
        
        /****** 首页导航栏 ******/
        Route::post('addHomeNav','Admin\HomeNavController@addHomeNav');
        Route::post('editHomeNav','Admin\HomeNavController@editHomeNav');
        Route::post('delHomeNav','Admin\HomeNavController@delHomeNav');
        
        /****** 首页内容 ******/
        Route::post('addHomeContent','Admin\HomeContentController@doAddHomeContent');
        Route::post('editHomeContent','Admin\HomeContentController@doEditHomeContent');
        Route::post('delHomeContent','Admin\HomeContentController@doDelHomeContent');
        
        /****** 新闻 ******/
        Route::post('addNews','Admin\NewsController@doAddNews');
        Route::post('editNews','Admin\NewsController@doEditNews');
        Route::post('delNews','Admin\NewsController@doDelNews');
        
        /***** 公告 *****/
        Route::post('addAffiche','Admin\AfficheController@doAddAffiche');
        Route::post('editAffiche','Admin\AfficheController@doEditAffiche');
        Route::post('delAffiche','Admin\AfficheController@doDelAffiche');
        
        /***** 订单分类 *****/
        Route::post('addOrderCategory','Admin\OrderCategoryController@doAddOrderCategory');
        Route::post('editOrderCategory','Admin\OrderCategoryController@doEditOrderCategory');
        Route::post('delOrderCategory','Admin\OrderCategoryController@doDelOrderCategory');
        
        /****** 订单列表 *****/
        Route::post('addOrder','Admin\OrderController@doAddOrder');
        Route::post('editOrder','Admin\OrderController@doEditOrder');
        Route::post('delOrder','Admin\OrderController@doDelOrder');
        
        /****** 售后管理 *****/
        Route::post('addApply','Admin\UserApplyController@doAddApply');
        Route::post('editApply','Admin\UserApplyController@doEditApply');
        Route::post('delApply','Admin\UserApplyController@doDelApply');
        
        /****** 留言管理 *****/
        Route::post('addAdvise','Admin\UserAdviseController@doAddAdvise');
        Route::post('editAdvise','Admin\UserAdviseController@doEditAdvise');
        Route::post('delAdvise','Admin\UserAdviseController@doDelAdvise');
    });
});