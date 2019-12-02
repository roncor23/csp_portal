<?php

use Illuminate\Http\Request;

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

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});


Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');

    //Admin save action list
    Route::post('action_list/admin','AdminController@save_actionList')->middleware('isAdmin');
    //Admin update action list
    Route::post('update_action_list/admin/{id}','AdminController@update_actionList')->middleware('isAdmin');
    //Admin remove action list
    Route::post('remove_action_list/admin/{id}','AdminController@remove_actionList')->middleware('isAdmin');
    //Admin fetch action list
    Route::get('fetch/action_list','AdminController@fetch_actionList')->middleware('isAdmin');


});
