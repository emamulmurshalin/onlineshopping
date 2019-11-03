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


Route::get('/', 'WelcomeController@index');
Route::get('/product-category/{id}', 'WelcomeController@categoryProduct');
Route::get('/product-details/{id}', 'WelcomeController@detailsProduct');
Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');

Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/new-category', 'CategoryController@saveCategory');
Route::get('/manage-category', 'CategoryController@manageCategory');
Route::get('/unpublished-category/{id}', 'CategoryController@unpublishCategory');
Route::get('/published-category/{id}', 'CategoryController@publishCategory');
Route::get('/edit-category/{id}', 'CategoryController@editCategory');
Route::post('/update-category', 'CategoryController@updateCategory');
Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');

Route::get('/add-brand', 'BrandController@addBrand');
Route::post('/new-brand', 'BrandController@saveBrand');
Route::get('/manage-brand', 'BrandController@manageBrand');
Route::get('/unpublished-brand/{id}', 'BrandController@unpublishBrand');
Route::get('/published-brand/{id}', 'BrandController@publishBrand');
Route::get('/edit-brand/{id}', 'BrandController@editBrand');
Route::post('/update-brand', 'BrandController@updateBrand');
Route::get('/delete-brand/{id}', 'BrandController@deleteBrand');

Route::get('/add-product', 'ProductController@addProduct');
Route::post('/new-product', 'ProductController@saveProduct');
Route::get('/manage-product', 'ProductController@manageProduct');
Route::get('/view-product/{id}', 'ProductController@viewProduct');
Route::get('/unpublished-product/{id}', 'ProductController@unpublishedProduct');
Route::get('/published-product/{id}', 'ProductController@publishedProduct');
Route::get('/edit-product/{id}', 'ProductController@editProduct');
Route::post('/update-product', 'ProductController@updateProduct');
Route::get('/delete-product/{id}', 'ProductController@deleteProduct');

Route::post('/add-cart', 'CartController@addCart');
Route::get('/show-cart', 'CartController@showCart');
Route::post('/update-cart-product', 'CartController@updateCartProduct');
Route::get('/delete-cart-product/{id}', 'CartController@deleteCartProduct');
Route::get('/direct-add-cart/{id}', 'CartController@directAddCartProduct');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/new-customer', 'CheckoutController@saveCustomerInfo');
Route::get('/shipping-info', 'CheckoutController@showShippingInfo');
Route::post('/customer-login', 'CheckoutController@customerLogin');
Route::post('/new-shipping-info', 'CheckoutController@shippingInfoSave');
Route::get('/payment-info', 'CheckoutController@showPaymentInfo');
Route::post('/new-order', 'CheckoutController@saveOrderInfo');
Route::post('/customer-logout', 'CheckoutController@customerLogout');
Route::get('/login-form', 'CheckoutController@customerLoginForm');
Route::get('/register-form', 'CheckoutController@customerRegisterForm');


