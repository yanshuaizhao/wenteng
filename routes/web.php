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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'Home'],function ($router) {
    $router->get('/', 'IndexController@index');
    $router->get('/sertype/kouyi.html', 'SerTypeController@kouyi');
    $router->get('/sertype/kouyi_more.html', 'SerTypeController@kouyiMore');
    $router->get('/sertype/biyi.html', 'SerTypeController@biyi');
    $router->get('/sertype/tingyi.html', 'SerTypeController@tingyi');

    // 翻译领域
    $router->get('/field.html', 'FieldController@index');
    $router->get('/field/{field?}.html', 'FieldController@detail')->where('field','[0-9]+');

    // 翻译语种
    $router->get('/lang.html', 'LangController@index');
    $router->get('/lang/{lang?}.html', 'LangController@detail')->where('lang','[0-9]+');

    // 服务流程
    $router->get('/service/standard.html', 'ServiceController@standard');
    $router->get('/service/process.html', 'ServiceController@process');
    $router->get('/service/control.html', 'ServiceController@control');

    // 优惠奖励
    $router->get('/discount.html', 'DiscountController@yhjl');
    $router->get('/discount/fxyl.html', 'DiscountController@fxyl');
    $router->get('/discount/jffx.html', 'DiscountController@jffx');

    // 关于我们
    $router->get('/about.html', 'AboutController@index');
    $router->get('/about/zizhi.html', 'AboutController@zizhi');
    $router->get('/about/rongyu.html', 'AboutController@rongyu');
    $router->get('/about/lianxi.html', 'AboutController@lianxi');


});


Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@loginPage')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->get('logout', 'LoginController@logout');

    $router->get('index', 'DashboardController@index');

    // 账号
    $router->get('adm_users/index', 'AdmUsersController@index');
    $router->post('adm_users/index', 'AdmUsersController@index');
    $router->resource('adm_users', 'AdmUsersController');

    // 角色
    $router->get('adm_roles/index', 'AdmRolesController@index');
    $router->post('adm_roles/index', 'AdmRolesController@index');
    $router->resource('adm_roles', 'AdmRolesController');

    // 权限
    $router->get('adm_permissions/index', 'AdmPermissionsController@index');
    $router->post('adm_permissions/index', 'AdmPermissionsController@index');
    $router->resource('adm_permissions', 'AdmPermissionsController');

    // 翻译语种
    $router->get('lang/index', 'LangController@index');
    $router->post('lang/index', 'LangController@index');
    $router->resource('lang', 'LangController');

    // 文章内容管理
    $router->get('article/index', 'ArticleController@index');
    $router->post('article/index', 'ArticleController@index');
    $router->resource('article', 'ArticleController');

    // 配置管理
    $router->get('conf/index', 'ConfController@index');
    $router->post('conf/index', 'ConfController@index');
    $router->resource('conf', 'ConfController');

    // 前台导航
    $router->get('nav/index', 'NavController@index');
    $router->post('nav/index', 'NavController@index');
    $router->resource('nav', 'NavController');

    // 译者列表
    $router->get('translator/index', 'TranslatorController@index');
    $router->post('translator/index', 'TranslatorController@index');
    $router->resource('translator', 'TranslatorController');

});
