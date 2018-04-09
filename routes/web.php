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
Auth::routes();


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('loguit', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('registreer', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registreer', 'Auth\RegisterController@register');


Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@dashboard');


Route::resource('producten', 'ProductController');

Route::resource('categorieën', 'CategoryController');
Route::get('categorieën/{name}', 'CategoryController@show');


Route::get('/winkelwagen','CartController@index');

Route::post('/winkelwagen','CartController@order');

Route::post('/winkelwagen/{name}','CartController@store');

Route::get('/winkelwagen/{name}','CartController@update');

Route::delete('/winkelwagen/{name}','CartController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/over_ons', 'HomeController@about');


// are all in /admin
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

    // categroy cms routes
    Route::get('/admin/categorieën', 'Back\CategoryController@index');
    Route::get('/admin/categorieën/toevoegen','Back\CategoryController@create');
    Route::post('/admin/categorieën/toevoegen','Back\CategoryController@store');
    Route::get('/admin/categorieën/wijzigen/{id}','Back\CategoryController@edit');
    Route::patch('/admin/categorieën/wijzigen/{id}','Back\CategoryController@update');
    Route::delete('/admin/categorieën/verwijderen/{id}','Back\CategoryController@destroy');

    Route::resource('/admin/producten', 'Back\ProductController');

    Route::resource('/admin/bestellingen', 'Back\OrderController');

});