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
Route::get('/category', 'WelcomeController@category');
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


