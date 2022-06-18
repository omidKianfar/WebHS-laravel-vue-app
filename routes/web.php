<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','MainController@welcome');
Route::get('products','MainController@allProducts')->name('allProducts');
Route::get('allCourse','MainController@allCourse')->name('allCourse');
Route::get('/course/search','MainController@searchCourse');
Route::get('/product/search','MainController@searchProduct');


Route::resource('carts', 'CartController');

Route::resource('orders', 'OrderController');

Route::resource('products.cart', 'ProductCartController');

Route::resource('order.payments', 'OrderPaymentController');


Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@postMail');

Route::resource('/profile','ProfileController');
Route::delete('/profile/destroyAccount/{id}','ProfileController@destroyAccount')->name('profile.destroyAccount');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin','AdminController@index')->name('admin.index');

    Route::get('/admin/courses','AdminController@courses')->name('admin.courses');
    Route::resource('admin/courses','CourseController');

    Route::get('/admin/products','AdminController@products')->name('admin.products');
    Route::resource('admin/products','ProductController');
    Route::delete('admin/products/destroyImage/{id}','ProductController@destroyImage')->name('products.destroyImage');

    Route::get('/admin/users','AdminController@users')->name('admin.users');
    Route::resource('admin/users','UserController');

});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
