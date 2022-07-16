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
Route::apiResource('comments','CommentController');
Route::get('categories/allcategories', 'CategoryController@index');
Route::get('categories/{slug}', 'CategoryController@categoryposts');
Route::get('searchposts/{query}','PostController@searchposts');
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::post('updateuserprofile', 'UserController@updateUserProfile');
// Settings
Route::get('allSettings','HomeController@allSettings');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'UserController@details');
    Route::apiResource('comments','CommentController');
});
Route::group(['prefix'=>'/admin','middleware'=>'auth:api'],function(){
    // Users
    Route::get('allUsers', 'UserController@allusers');
    Route::post('adduser', 'UserController@addUser');
    Route::post('updateuserinfo', 'UserController@updateUser');
    Route::post('deleteUser','UserController@deleteUser');
    // Categories
    Route::get('categories','AdminController@getCategories');
    Route::post('addCategory','CategoryController@addCategory');
    Route::post('updateCategory','CategoryController@updateCategory');
    Route::post('deleteCategory','CategoryController@deleteCategory');
    // Posts
    Route::get('allposts','AdminController@getPosts');
    Route::post('addPost','AdminController@addPost');
    Route::post('updatePost','AdminController@updatePost');
    Route::post('deletePosts','AdminController@deletePosts');
    // Home
    Route::get('getStatistics','AdminController@getStatistics');
    // Settings
    Route::post('settings','AdminController@settings');
    // Comments

});
