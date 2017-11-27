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


});
