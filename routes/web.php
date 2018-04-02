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

Route::get('/', 'Shop\IndexController@index');
Route::get('/Good/{Good}', 'Shop\IndexController@goodDetail');

Route::get('/ShopAdmin',function(){
    return redirect('ShopAdmin/dashboard');
});

Route::group(['prefix' => 'ShopAdmin'], function () {
    Route::get('dashboard', 'ShopAdmin\IndexController@dashboard');
    Route::resource('Goods', 'ShopAdmin\GoodsController');
    Route::post('Goods/changeSatatus/{Good}', 'ShopAdmin\GoodsController@changeGoodStatus');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
