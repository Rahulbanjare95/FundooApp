<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::group([
    'middleware' =>'api',
    'namespace'=>'App\Http\Controllers',
    'prefix'=>'auth'
], function($router){
    Route::post('login','AuthController@login');
    Route::post('register','AuthController@register');
    Route::post('logout','AuthController@logout');
    Route::get('UserProfile','AuthController@userProfile');
    Route::post('refresh','AuthController@refresh');

});

Route::group([
    'middleware' =>'api',
    'namespace'=>'App\Http\Controllers',
    'prefix'=>'auth/notes'

], function($router){
    Route::post('createNotes','NotesController@createNote');
}
);
