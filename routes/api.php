<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts/allposts', 'PostController@allposts');
Route::apiResource('posts','PostController');
Route::post('comment/create', 'CommentController@store');
Route::get('categories/allcategories', 'CategoryController@index');
Route::get('categories/{slug}', 'CategoryController@categoryposts');
Route::get('searchposts/{query}','PostController@searchposts');
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'UserController@details');
  //  Route::post('comment/create', 'CommentController@store');

});
