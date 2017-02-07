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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth'],'prefix' => 'settings'], function () {
	
	Route::get('/food',['as' => 'settings.food','uses' => 'FoodController@index']); 
	Route::post('/food-create',['as' => 'settings.food.create','uses' => 'FoodController@create']);
	Route::post('/food-update',['as' => 'settings.food.update','uses' => 'FoodController@update']);
	Route::post('/food-delete',['as' => 'settings.food.delete','uses' => 'FoodController@delete']);


	Route::get('/package',['as' => 'settings.package','uses' => 'PackageController@index']); 
	Route::post('/package-create',['as' => 'settings.package.create','uses' => 'PackageController@create']);
	Route::post('/package-update',['as' => 'settings.package.update','uses' => 'PackageController@update']);
	Route::post('/package-delete',['as' => 'settings.package.delete','uses' => 'PackageController@delete']);


	Route::get('/food-category',['as' => 'settings.food-category','uses' => 'FoodCategoryController@index']); 
	Route::post('/food-category-create',['as' => 'settings.food-category.create','uses' => 'FoodCategoryController@create']);
	Route::post('/food-category-update',['as' => 'settings.food-category.update','uses' => 'FoodCategoryController@update']);
	Route::post('/food-category-delete',['as' => 'settings.food-category.delete','uses' => 'FoodCategoryController@delete']);


	Route::get('/event',['as' => 'settings.event','uses' => 'EventController@index']); 
	Route::post('/event-create',['as' => 'settings.event.create','uses' => 'EventController@create']);
	Route::post('/event-update',['as' => 'settings.event.update','uses' => 'EventController@update']);
	Route::post('/event-delete',['as' => 'settings.event.delete','uses' => 'EventController@delete']);

}); 
