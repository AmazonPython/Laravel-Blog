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

/*Route::get('/', function () {//闭包路由
      return view('welcome');
});*/

//取消了注册功能，若有需求则用 Auth::routes() 代替以下三行代码
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//首页 GET方法访问 域名/路由 的时候，调用HomeController控制器index方法
Route::get('/', 'HomeController@index')->name('home');//->name('')命名路由，可不写

//文章详情页
Route::get('/article/{id}', 'ArticleController@show');

//搜索
Route::get('/search', 'ArticleController@search')->name('search');

//About me
Route::get('/about', 'HomeController@about');

/**
 * 后台登录
 * 登录功能由middleware定义，/admin 由prefix定义，Admin由namespace定义。
 * 路由组可以给组内路由一次性增加命名空间、uri前缀、域名限定、中间件等属性
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    //若已登录，则将域名/admin重定向至Admin/HomeController
    Route::get('/', 'HomeController@index');

    //后台文章页
    //配置资源路由得到7条路由配置，完成增删改查操作
    Route::resource('/articles', 'ArticleController');
});
