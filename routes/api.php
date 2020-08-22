<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('readProducts','ProductController@getAll');
Route::get('readCategories','CategoryController@getAll');
Route::get('productsWithCategory','CategoryController@getWithCategories');
Route::get('productsOfACategory/{category_id}','ProductController@getAllProductsOfCategory');
Route::post('login','UserController@login');
Route::post('newUser','UserController@setNew');

Route::group(['middleware' => 'auth:api'], function() {
Route::get('user','UserController@user');
Route::get('logout','UserController@logout');
Route::post('addOrder/{id}','OrderController@addOrder');
Route::get('getCart','CartController@getCart');
Route::get('getTotal','CartController@getTotal');
Route::delete('deleteOrderProduct/{id}','CartController@deleteOrderProduct');
Route::post('newShip','ShipmentController@newShip');
Route::get('setStage/{id}','ShipmentController@setInNextStage');
Route::get('getShips','ShipmentController@getShips');
});