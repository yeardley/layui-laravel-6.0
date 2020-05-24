<?php
/**
 * @Author yeardley
 * @Date 2020/4/29 17:53
 * @Email 510865496@qq.com
 */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AdminHelpers Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group([

], function ($route) {
    $route->get('login', 'LoginController@index')->name('admin.login');
    $route->post('login', 'LoginController@store');
    $route->get('/', 'IndexController@index');
    $route->get('logout', 'LoginController@destroy');
    $route->get('home', 'IndexController@home');
    $route->resource('menus', 'System\MenusController');
});
