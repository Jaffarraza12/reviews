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
Route::get('/', function () {
    return view('welcome');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::get('home', 'HomeController@index');
Route::get('review/html/{id}', 'ReviewsController@HTMLBLOCK');
Route::get('question/html/{id}', 'QuestionController@HTMLBLOCK');
Route::get('complain/html/{id}', 'ComplainController@HTMLBLOCK');
Route::get('contact/html/{id}', 'ContactController@HTMLBLOCK');
Route::get('warranty/html/{id}', 'ContactController@WARRANTYHTMLBLOCK');
Route::get('retailer/html/{id}', 'ContactController@RETAILERHTMLBLOCK');
Route::get('product-register/html/{id}', 'ProductRegisterController@HTMLBLOCK');



Route::get('complain/all', 'ComplainController@loadAll');
Route::get('contacts/all',function(){
  return view('contact.view');
});
Route::get('products/all',function(){
  return view('product.view');
});

Route::get('warranties/all',function(){
  return view('warranty.view');
});
Route::get('retailers/all',function(){
  return view('retailer.view');
});
Route::get('reviews/all',function(){
  return view('review.view');
});
Route::get('questions/all',function(){
  return view('questions.view');
});
