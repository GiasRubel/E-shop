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

Route::group(['prefix' => 'admins'], function () {

	Route::resource('/product', 'admin\productController');

	Route::resource('/catagory', 'admin\catagoryController');

	Route::resource('/brand', 'admin\brandController');

	Route::resource('/country', 'admin\CountryController');

	Route::resource('/city', 'admin\CityController');

	Route::get('/order-list', 'user\OrderController@adminorderlist')->name('admin.orderlist');

	Route::get('/order-single/{id}', 'user\OrderController@adminordershow')->name('adminorder.show');

	Route::put('/order-status/{order}', 'user\OrderController@adminstatusupdate')->name('order.statusupdate');

	Route::delete('/order-list/{order}', 'user\OrderController@adminOrderDestroy')->name('order.delete');

	Route::get('/login', 'admin\adminController@showLoginForm')->name('admin.dashboard');
	Route::post('/login', 'admin\adminController@login')->name('admin.login');
	Route::post('/logout', 'admin\adminController@logout')->name('admin.logout');

	Route::get('/home', function(){
		return view('admin.home');
	});

	Route::get('/', function () {
	    return view('admin.home');
	})->name('admins.home');

});


Route::get('/cart', 'user\CartController@show')->name('user.cart');

// Route::post('/cart/{id}', 'user\CartController@addCart')->name('cart');
Route::match(['GET', 'POST'], '/cart/{id}', 'user\CartController@addCart')->name('cart');

Route::put('/cart/{id}', 'user\CartController@update')->name('cart.update');

Route::delete('/cart/{id}', 'user\CartController@destroy')->name('cart.delete');

Route::post('/wish/{id}','user\WishController@wishUpdate')->name('wish.update');

Route::get('wish-list', 'user\WishController@index')->name('wish.index');

Route::delete('/wish/{id}', 'user\WishController@destroy')->name('wish.destroy');

Route::get('/order', 'user\OrderController@show')->name('order.show');

Route::get('/order/get/{id}', 'user\OrderController@getcity');

Route::post('/order', 'user\OrderController@store')->name('order.store');

Route::get('/order-list','user\OrderController@list')->name('order.list');

Route::delete('/order/{id}', 'user\OrderController@destroy')->name('order.destroy');

Route::get('/single-product/{id}', 'user\UserController@show')->name('product.single');

Route::get('/','user\UserController@index')->name('user.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
