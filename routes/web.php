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

// Login 
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/registrasi', 'AuthController@registrasi')->name('register');
Route::post('/postregistrasi', 'AuthController@postregistrasi');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::get('/delivery', function () {
    return view('deliveries.index');
});


Route::group(['middleware'=>'auth'],function(){

// Dashboard
Route::get('/', 'adminController@dashboard')->name('dashboard');

Route::get('/process/{id}', 'adminController@praProcess')->name('pra.process');
Route::post('/getprocess/{id}', 'adminController@process')->name('process');

Route::get('/delivery_success/{id}', 'adminController@modalDeliverySuccess')->name('delivery');
Route::post('/get_delivery_success/{id}', 'adminController@deliverySuccess')->name('delivery.success');

Route::get('getDataOrderDashboardWaiting', [
    'uses' => 'adminController@orderData',
    'as' => 'ajax.get.data.order.dashboard.waiting'
]);
Route::get('getDataDeliveryDashboardProcess', [
    'uses' => 'adminController@deliveryData',
    'as' => 'ajax.get.data.delivery.dashboard.process'
]);

// PRODUCT 
// Merangkum route store, index, update, delete, show dan create. 
Route::resource('product', 'productController');
Route::get('getDataProductsIndex', [
    'uses' => 'productController@indexData',
    'as' => 'ajax.get.data.product.index'
]);
Route::get('/product/deletedModal/{id}', 'productController@destroyModal');
Route::get('/product/deleteConfirm/{id}', 'productController@destroyModal' );

// CATEGORY
// Merangkum route store, index, update, delete, show dan create.
Route::resource('category', 'categoryController');
Route::get('getDataCategorysIndex', [
    'uses' => 'categoryController@indexData',
    'as' => 'ajax.get.data.category.index'
]);
Route::get('/category/deleteConfirm/{id}', 'categoryController@destroyModal' );

// CUSTOMER
// Merangkum route store, index, update, delete, show dan create.
Route::get('customer/create_admin', 'customerController@create');
Route::resource('customer', 'customerController');
Route::get('getDataCustomersIndex', [
    'uses' => 'customerController@indexData',
    'as' => 'ajax.get.data.customer.index'
]);
Route::get('/customer/deleteConfirm/{id}', 'customerController@destroyModal' );

// SECTOR
// Merangkum route store, index, update, delete, show dan create.
Route::resource('sector', 'sectorController');
Route::get('getDataSectorsIndex', [
    'uses' => 'sectorController@indexData',
    'as' => 'ajax.get.data.sector.index'
]);
Route::get('/sector/deleteConfirm/{id}', 'sectorController@destroyModal' );
// SECTOR DETAIL
Route::resource('sectorDetail', 'sectorDetailController');
Route::get('getDataSectorsDetailIndex/{id}', [
    'uses' => 'sectorDetailController@indexData',
    'as' => 'ajax.get.data.sector.detail.index'
]);
Route::get('/sectorDetail/deleteConfirm/{id}', 'sectorController@destroyModal' )->name('deletedConfim');

// COURIR 
// Merangkum route store, index, update, delete, show dan create. 
Route::resource('/courir', 'courirController');
Route::get('getDataCourirsIndex', [
    'uses' => 'courirController@indexData',
    'as' => 'ajax.get.data.courir.index'
]);
Route::get('/courir/deletedModal/{id}', 'courirController@destroyModal');
Route::get('/courir/deleteConfirm/{id}', 'courirController@destroyModal' );
// Delivery 
// Merangkum route store, index, update, delete, show dan create. 
Route::resource('/delivery', 'deliveryController');
Route::get('getDataDeliveryIndexSuccess', [
    'uses' => 'deliveryController@indexDataSuccess',
    'as' => 'ajax.get.data.delivery.index.success'
]);
Route::get('getDataDeliveryIndexDelivery', [
    'uses' => 'deliveryController@indexDataDelivery',
    'as' => 'ajax.get.data.delivery.index.delivery'
]);
Route::get('/delivery/deleteConfirm/{id}', 'deliveryController@destroyModal' );

// Order
// Merangkum route store, index, update, delete, show dan create.
Route::resource('order', 'orderController')->except(['create', 'store']);
Route::get('getDataOrderIndexWait', [
    'uses' => 'orderController@indexDataWait',
    'as' => 'ajax.get.data.order.index.wait'
]);
Route::get('getDataOrderIndexSuccess', [
    'uses' => 'orderController@indexDataSuccess',
    'as' => 'ajax.get.data.order.index.success'
]);
Route::get('getDataOrderIndexDelivery', [
    'uses' => 'orderController@indexDataDelivery',
    'as' => 'ajax.get.data.order.index.delivery'
]);
Route::get('/order/deleteConfirm/{id}', 'orderController@destroyModal' );

});


