<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
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

// Route::get('/adminpanel', function () {
//     return view('admin.layouts.app');
// });

// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::get('adminpanel/{any?}', function () {
        return view('admin.layouts.app');
})->where('any', '.*');

    Route::get('{any}', function () {
        return view('layouts.app');
    })->where('any', '.*');



// ->middleware(['admin'])

// Auth::routes();

 //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
