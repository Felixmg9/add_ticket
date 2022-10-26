<?php

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController; 
use \App\Http\Controllers\GetController; 
use \App\Models\Ticket;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('projects')->group(function () {
        Route::get('', '\App\Http\Controllers\PostController@index');
        Route::get('create', '\App\Http\Controllers\PostController@create');
        Route::post('create', '\App\Http\Controllers\PostController@store');
        Route::get('show/{id}', '\App\Http\Controllers\PostController@show');
        Route::get('delete/{id}', '\App\Http\Controllers\PostController@destroy');
        Route::get('edit/{id}', '\App\Http\Controllers\PostController@edit');
        Route::put('edit/{id}', '\App\Http\Controllers\PostController@update');
    });
});

Route::get('/', function (Request $request) 
{
	//(new GetController)->store($request);
	(new GetController)->my_append($_GET);
	//(new Ticket)->my_append($_GET);
	$_GET = [];
	return view('welcome');
});

/*
Route::post('http://test-lvl/', function()
{
	return "Форма обработана!";
});
*/

Route::get('get', '\App\Http\Controllers\GetController@store');

//Route::get('post/create', '\App\Http\Controllers\PostController@create');
//Route::post('post', '\App\Http\Controllers\PostController@store');
