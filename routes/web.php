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

Route::get('/', function () {
    return response()->json([
        'name'        => env('APP_NAME'),
        'version'     => env('APP_VERSION'),
        'author'      => 'Selim SARAL',
        'description' => env('APP_NAME')
    ]);
});

Route::get('login', 'LoginController@index');

Route::group(['middleware' => 'checkToken'], function () {

    Route::group(['prefix' => 'favorite'], function () {
        Route::get('list', 'FavoriteController@favoriteList');
        Route::post('add', 'FavoriteController@addFavorite');
        Route::delete('remove', 'FavoriteController@removeFavorite');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('list', 'CategoryController@categoryList');
        Route::get('detail', 'CategoryController@categoryDetail');
    });

});