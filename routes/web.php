<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UserController@index')->name('users.index');
            Route::get('/create', 'UserController@create')->name('users.create');
            Route::post('/create', 'UserController@store')->name('users.store');
            Route::get('/{user}/show', 'UserController@show')->name('users.show');
            Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UserController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UserController@destroy')->name('users.destroy');
        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'reservation'], function() {
            Route::get('/', 'ReservationController@index')->name('reservation.index');
            Route::get('/create', 'ReservationController@create')->name('reservation.create');
            Route::post('/create', 'ReservationController@store')->name('reservation.store');
            Route::get('/{reservation}/show', 'ReservationController@show')->name('reservation.show');
            Route::get('/{reservation}/edit', 'ReservationController@edit')->name('reservation.edit');
            Route::patch('/{reservation}/update', 'ReservationController@update')->name('reservation.update');
            Route::delete('/{reservation}/delete', 'ReservationController@destroy')->name('reservation.destroy');
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});