<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Frontend
//Home Page
Route::get('/', 'HomeController@index');
Route::get('/all-product', 'HomeController@all_product');
Route::get('/product-category/{category_id}', 'HomeController@product_category');
Route::get('/product-detail/{product_id}', 'HomeController@product_detail');
Route::get('/about', 'HomeController@about');


//Profile
Route::get('/my-profile/{id}', 'HomeController@my_profile');
Route::post('/update-profile/{id}', 'HomeController@update_profile');
Route::get('/my-order/{id}', 'HomeController@my_order');




//Cart
Route::get('/cart', 'CartController@cart');
Route::post('/add-cart', 'CartController@add_cart');
Route::get('/update-cart-minus/{id}', 'CartController@update_cart_minus');
Route::get('/update-cart-plus/{id}', 'CartController@update_cart_plus');
Route::get('/remove-cart/{id}', 'CartController@remove_cart');


//Checkout
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/checkout', 'CheckoutController@checkout_check');
Route::get('/success', 'CheckoutController@success');



//Login Page
Route::get('/login', 'AuthController@index');
Route::post('/login-check', 'AuthController@login_check');
Route::get('/register', 'AuthController@register');
Route::post('/register-check', 'AuthController@register_check');
Route::get('/logout', 'AuthController@logout');






//Backend
Route::get('/admin-home', 'AdminController@admin_home');

//Customer
Route::get('/user-content', 'CustomerController@index');
Route::get('/add-customer', 'CustomerController@create');
Route::post('/add-customer', 'CustomerController@store');
Route::get('/delete-customer/{id}', 'CustomerController@destroy');
Route::get('/edit-customer/{id}', 'CustomerController@edit');
Route::post('/edit-customer/{id}', 'CustomerController@update');


//Category
Route::get('/category-content', 'CategoryController@index');
Route::get('/add-category', 'CategoryController@create');
Route::post('/add-category', 'CategoryController@store');
Route::get('/delete-category/{id}', 'CategoryController@destroy');
Route::get('/edit-category/{id}', 'CategoryController@edit');
Route::post('/edit-category/{id}', 'CategoryController@update');
Route::get('/unactive-category/{id}', 'CategoryController@unactive_category');
Route::get('/active-category/{id}', 'CategoryController@active_category');


//Product
Route::get('/product-content', 'ProductController@index');
Route::get('/add-product', 'ProductController@create');
Route::post('/add-product', 'ProductController@store');
Route::get('/delete-product/{id}', 'ProductController@destroy');
Route::get('/edit-product/{id}', 'ProductController@edit');
Route::post('/edit-product/{id}', 'ProductController@update');
Route::get('/unactive-product/{id}', 'ProductController@unactive_product');
Route::get('/active-product/{id}', 'ProductController@active_product');


//Shipping
Route::get('/shipping-content', 'ShippingController@index');
Route::get('/detail-shipping/{id}', 'ShippingController@show');


//Update Shipping
Route::get('/status-notPackaging/{id}', 'ShippingController@status_notPackaging');
Route::get('/status-notDelivery/{id}', 'ShippingController@status_notDelivery');
Route::get('/status-notSuccess/{id}', 'ShippingController@status_notSuccess');

Route::get('/status-onPackaging/{id}', 'ShippingController@status_onPackaging');
Route::get('/status-onDelivery/{id}', 'ShippingController@status_onDelivery');
Route::get('/status-success/{id}', 'ShippingController@status_success');
