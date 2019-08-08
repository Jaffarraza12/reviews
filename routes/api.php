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
Route::delete('review/{id}', 'ReviewsController@delete');



Route::get('question', 'QuestionController@index');
Route::post('question', 'QuestionController@store');
Route::post('answer', 'QuestionController@Anstore');

