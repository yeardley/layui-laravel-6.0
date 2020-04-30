<?php
/**
 * @Author yeardley
 * @Date 2020/4/29 17:53
 * @Email 510865496@qq.com
 */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('admin.login');
});
Route::post('/login', 'LoginController@store');

Route::group([

], function ($route) {
    $route->get('/', 'IndexController@index');
    $route->get('/logout', 'LoginController@destroy');
});
