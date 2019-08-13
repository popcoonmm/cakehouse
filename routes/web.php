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
Route::get('/', 'MenuController@home');
Route::get('menu', 'Admin\MenuController@index');
Route::get('house1', 'MenuController@index');
Route::get('home', 'MenuController@index');


Route::group(['prefix' => 'shop',"middleware" => "auth:shop"],function(){


  Route::get('menu/create','Shop\MenuController@add');
  Route::post('menu/create', 'Shop\MenuController@create');

      Route::get('menu/edit', 'Shop\MenuController@edit');
      Route::post('menu/edit', 'Shop\MenuController@update');
      Route::get('menu/delete','Shop\MenuController@delete');
      Route::get('menu', 'Shop\MenuController@index');
  // Route::get("news/create","Admin\NewsController@add")->middleware('auth');
  // Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
  // Route::get('news/update', 'Admin\NewsController@update')->middleware('auth');
  // Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
  // Route::get('news', 'Admin\NewsController@index')->middleware('auth');
  // Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
  // Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 追記 // 追記 # 追記
  // Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');





});
//
// Route::get('/admin/menu/create','Admin\MenuController@add')->middleware('auth:admin');
// Route::post('/admin/menu/create', 'Admin\MenuController@create');

  Route::get('/admin/login',     'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/admin/login',    'Admin\Auth\LoginController@login');
  Route::get('/admin/register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
  Route::post('/admin/register', 'Admin\Auth\RegisterController@register')->name('admin.register');



    Route::get('/shop/login',     'Shop\Auth\LoginController@showLoginForm')->name('shop.login');
    Route::post('/shop/login',    'Shop\Auth\LoginController@login');
    Route::get('/shop/register', 'Shop\Auth\RegisterController@showRegisterForm')->name('shop.register');
    Route::post('/shop/register', 'Shop\Auth\RegisterController@register')->name('shop.register');


Auth::routes();
// Route::get('/', 'NewsController@index');

// Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'reserves','middleware'=>'auth:user'], function() {
   Route::get('index','Reserve\ReserveController@index');
   Route::post('create','Reserve\ReserveController@create');
   Route::get('edit','Reserve\ReserveController@edit');
   Route::post('edit','Reserve\ReserveController@update');
   Route::get('delete','Reserve\ReserveController@delete');
});
