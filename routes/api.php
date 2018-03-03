<?php

use Illuminate\Http\Request;

Route::get('users/index', 'api\userController@index');
Route::get('users/getUser/{id}', 'api\userController@show');
Route::get('users/getUserOrders/{id}', 'api\userController@getUserOrders');

Route::get('orders/index', 'api\orderController@index');
Route::get('orders/getOrder/{id}', 'api\orderController@show');
Route::post('orders/createOrder', 'api\orderController@store');
Route::delete('orders/{id}', 'api\orderController@deleteOrder');
Route::get('orders/full', 'api\orderController@getOrdersFull');

Route::get('products/index', 'api\productController@index');
Route::get('products/getProduct/{id}', 'api\productController@show');

Route::get('promotions/index', 'api\promotionController@index');
Route::get('promotions/getPromotion/{id}', 'api\promotionController@show');
Route::get('promotions/getPromotionProduct/{id}', 'api\promotionController@getPromotionProduct');

Route::get('recommend', 'api\recommendationController@recommend');
