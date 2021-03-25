<?php

use Illuminate\Http\Request;

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

Route::get('city', 'areaApiController@getCity');
Route::get('district', 'areaApiController@getDistrict');
Route::post('cost', 'areaApiController@getCourier');
Route::resource('sector', 'sectorController');
Route::resource('sectorDetail', 'sectorDetailController');

// Regristrasi
Route::post('/customer/regristrasi', 'Api\RegristrasiController@register');
// Login
Route::post('/customer/login', 'Api\LoginController@login');
// Product
Route::get('/product', 'Api\ProductController@getAllProduct');
Route::get('/product/detail/{id}', 'Api\ProductController@detailProduct');
Route::get('/product/search/{keyword}', 'Api\ProductController@productSearch');
Route::get('/product/category/{category}', 'Api\ProductController@productByCategory');
// Category
Route::get('/category', 'Api\CategoryController@getCategory');
// Sector Detail
Route::get('/sector_detail', 'Api\SectorController@getSectorDetail');
// Profil
Route::get('/profil/{id}', 'Api\ProfilController@profil');
Route::get('/profil/{id}/BalanceAndPoint', 'Api\ProfilController@balance');
// Transaksi 
Route::post('/checkout', 'Api\TransaksiController@transaction');
// History Transaksi
Route::get('/history/completed/{customer_id}', 'Api\HistoryTrcController@completed');
Route::get('/history/process/{customer_id}', 'Api\HistoryTrcController@process');
Route::get('/history/order/detail/{id}', 'Api\HistoryTrcController@detailTransaction');



