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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/categories','API\CategoryController');
Route::apiResource('/products','API\ProductController');
Route::apiResource('/sliders','API\SliderController');
Route::apiResource('/orders','API\OrderController');
Route::get('/hot-products','API\ProductController@getHotProducts');
Route::get('/new-arrivals-products','API\ProductController@getNewArrivals');
Route::get('/products/category/{categoreyId}','API\ProductController@getProductsByCategories');