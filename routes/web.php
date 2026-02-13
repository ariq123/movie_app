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
use App\Http\Controllers\LanguageController; 

Route::get('/', 'AuthController@loginForm'); // Ensure 'loginForm' exists in AuthController
Route::post('/login', 'AuthController@login'); // Ensure 'login' exists in AuthController

Route::group(['middleware' => ['check.login', 'prevent.back', 'setlocale']], function () {
    Route::get('/movies', 'MovieController@index'); // Ensure 'index' exists in MovieController
    Route::get('/movies/{id}', 'MovieController@show'); // Ensure 'show' exists in MovieController
    Route::get('/logout', 'AuthController@logout'); // Ensure 'logout' exists in AuthController
    Route::post('/favorites', 'FavoriteController@store'); // Ensure 'store' exists in FavoriteController
    Route::get('/favorites', 'FavoriteController@index'); // Ensure 'index' exists in FavoriteController
    Route::delete('/favorites/{id}', 'FavoriteController@destroy'); // Ensure 'destroy' exists in FavoriteController
});

Route::get('change-language/{lang}', 'LanguageController@changeLanguage')->name('change.language');

Route::fallback(function () {
    return redirect('/');
});



