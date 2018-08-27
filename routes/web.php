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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jobs', 'JobController@index');



$router->group(['middleware' => 'auth'], function () use ($router) {

    Route::resource('roles', 'RoleController');
    Route::resource('jobs', 'JobController')->except(['index']);
    Route::resource('jobs.tasks', 'TaskController')->only([
        'store', 'update', 'destroy'
    ]);

});

