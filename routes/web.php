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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],
function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('subcategories/{id}', 'ProductController@loadSubCategories');
    Route::resource('category','CategoryController');
    Route::resource('subcategory','SubcategoryController');
    Route::resource('product','ProductController');
});


