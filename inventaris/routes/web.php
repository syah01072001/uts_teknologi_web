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
    return view('welcome');
});

Route::get('/keluar',function(){
    \Auth::logout();

    return redirect('/');
});

Route::group(['middleware'=>'auth'],function(){

    Route::get('/supplier','Supplier_controller@index');

	Route::get('/supplier/add','Supplier_controller@add');
	Route::post('/supplier/add','Supplier_controller@store');

	Route::get('/supplier/{id}','Supplier_controller@edit');
	Route::put('/supplier/{id}','Supplier_controller@update');

	Route::delete('/supplier/{id}','Supplier_controller@delete');

	// manage produk
	
	
	Route::get('/produk/add','Produk_controller@add');
	Route::post('/produk/add','Produk_controller@store');
	Route::get('/produk','Produk_controller@home');

	Route::get('/produk/{id}','Produk_controller@edit');
	Route::put('/produk/{id}','Produk_controller@update');

	Route::delete('/produk/{id}','Produk_controller@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
