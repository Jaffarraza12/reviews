<?php

use Illuminate\Http\Request;
use App\Http\Models\Review;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('review', 'ReviewsController@index');
Route::get('review/{id}', 'ReviewsController@show');
Route::post('review', 'ReviewsController@store');
Route::put('review/{id}', 'ReviewsController@update');
Route::post('review/help/{id}', 'ReviewsController@helpful');
Route::post('review/no-help/{id}', 'ReviewsController@nohelpful');
Route::delete('review/{id}', 'ReviewsController@delete');
Route::get('grid-reviews', 'ReviewsController@grid');
Route::put('question/{id}', 'QuestionController@update');



Route::get('question', 'QuestionController@api');
Route::post('question', 'QuestionController@store');
Route::post('answer', 'QuestionController@Anstore');
Route::post('contact', 'ContactController@store');
Route::post('warranty', 'ContactController@warranty');
Route::post('retailer', 'ContactController@retailer');
Route::post('complain', 'ComplainController@store');
Route::post('product-register', 'ProductRegisterController@store');


Route::get('complains', 'ComplainController@index');
Route::get('contacts', 'ContactController@index');
Route::get('products', 'ProductRegisterController@index');
Route::get('warranties', 'ContactController@WarrantiesListing');
Route::get('retailers', 'ContactController@RetailerListing');
Route::get('reviews', 'ReviewsController@GetAllReviews');
Route::get('questions', 'QuestionController@index');
