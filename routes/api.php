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
    // Route::get('users', 'UserController@index')->middleware('isAdmin');
    // Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');

    // //Admin save action list
    // Route::post('action_list/admin','AdminController@save_actionList')->middleware('isAdmin');
    // //Admin update action list
    // Route::post('update_action_list/admin/{id}','AdminController@update_actionList')->middleware('isAdmin');
    // //Admin remove action list
    // Route::post('remove_action_list/admin/{id}','AdminController@remove_actionList')->middleware('isAdmin');
    // //Admin fetch action list
    // Route::get('fetch/action_list','AdminController@fetch_actionList')->middleware('isAdmin');


    // Applicant return USER name
    Route::get('applicant/fetch_user_name','applicantController@fetch_user_name')->middleware('isApplicant');
    // Applicant
    Route::get('applicant/fetch_applicant','applicantController@fetch_applicant')->middleware('isApplicant');
    // Applicant list of city
    Route::get('applicant/fetch_city','applicantController@fetch_city')->middleware('isApplicant');
    // Applicant list of brgy
    Route::get('applicant/fetch_brgy','applicantController@fetch_brgy')->middleware('isApplicant');
    // Applicant list of province
    Route::get('applicant/fetch_province','applicantController@fetch_province')->middleware('isApplicant');
    // Applicant list of HEI
    Route::get('applicant/fetch_hei','applicantController@fetch_hei')->middleware('isApplicant');
    // Applicant list of program
    Route::get('applicant/fetch_program','applicantController@fetch_program')->middleware('isApplicant');
    // Applicant update applicant
    Route::post('applicant/update_applicant/{id}','applicantController@update_applicant')->middleware('isApplicant');
    // Applicant change password
    Route::post('applicant/change_password/','applicantController@change_password')->middleware('isApplicant');





    // Super Admin add account
    Route::post('super_admin/add_account','SuperAdminController@add_account')->middleware('isCHED_super_admin');
    // Super Admin fetch all HEI
    Route::get('super_admin/fetch_hei','SuperAdminController@fetch_hei')->middleware('isCHED_super_admin');



    // CHED Admin list of applicant
    Route::get('ched_admin/fetch_applicant','CHEDAdminController@fetch_applicant')->middleware('isCHED_admin');
    // CHED Admin list of enrolled applicant
    Route::get('ched_admin/fetch_enrolled_applicant','CHEDAdminController@fetch_enrolled_applicant')->middleware('isCHED_admin');
    // CHED Admin list of not enrolled applicant
    Route::get('ched_admin/fetch_not_enrolled_applicant','CHEDAdminController@fetch_not_enrolled_applicant')->middleware('isCHED_admin');
    // CHED Admin list of brgy
    Route::get('ched_admin/fetch_brgy','CHEDAdminController@fetch_brgy')->middleware('isCHED_admin');
    // CHED Admin list of city
    Route::get('ched_admin/fetch_city','CHEDAdminController@fetch_city')->middleware('isCHED_admin');
    // CHED Admin list of province
    Route::get('ched_admin/fetch_province','CHEDAdminController@fetch_province')->middleware('isCHED_admin');
    // CHED Admin list of HEI
    Route::get('ched_admin/fetch_hei','CHEDAdminController@fetch_hei')->middleware('isCHED_admin');
    // CHED Admin list of program
    Route::get('ched_admin/fetch_program','CHEDAdminController@fetch_program')->middleware('isCHED_admin');
    // CHED Admin update applicant
    Route::post('ched_admin/update_applicant/{id}','CHEDAdminController@update_applicant')->middleware('isCHED_admin');
    // CHED Admin return USER name
    Route::get('ched_admin/fetch_user_name','CHEDAdminController@fetch_user_name')->middleware('isCHED_admin');
    // CHED Admin change password
    Route::post('ched_admin/change_password/','CHEDAdminController@change_password')->middleware('isCHED_admin');


    // HEI COORDINATOR list of applicant
    Route::get('hei_coordinator/fetch_applicant','HEICoordinatorController@fetch_applicant')->middleware('isHei');
    // HEI COORDINATOR list of brgy
    Route::get('hei_coordinator/fetch_brgy','HEICoordinatorController@fetch_brgy')->middleware('isHei');
    // HEI COORDINATOR list of city
    Route::get('hei_coordinator/fetch_city','HEICoordinatorController@fetch_city')->middleware('isHei');
    // HEI COORDINATOR list of province
    Route::get('hei_coordinator/fetch_province','HEICoordinatorController@fetch_province')->middleware('isHei');
    // HEI COORDIANTOR list of HEI
    Route::get('hei_coordinator/fetch_hei','HEICoordinatorController@fetch_hei')->middleware('isHei');
    // HEI COORDINATOR list of program
    Route::get('hei_coordinator/fetch_program','HEICoordinatorController@fetch_program')->middleware('isHei');
    // HEI COORDINATOR return HEI name
    Route::get('hei_coordinator/fetch_hei_name','HEICoordinatorController@fetch_hei_name')->middleware('isHei');
    // HEI COORDINATOR return USER name
    Route::get('hei_coordinator/fetch_user_name','HEICoordinatorController@fetch_user_name')->middleware('isHei');
    // HEI COORDINATOR update applicant
    Route::post('hei_coordinator/update_applicant/{id}','HEICoordinatorController@update_applicant')->middleware('isHei');
    // HEI change password
    Route::post('hei_coordinator/change_password/','HEICoordinatorController@change_password')->middleware('isHei');
});

    //Public fetch all province
    Route::get('fetch/province','applicantController@fetch_province');
    //Public fetch all city
    Route::get('fetch/city','applicantController@fetch_city');
    //Public fetch all barangay
    Route::get('fetch/brgy','applicantController@fetch_brgy');
    //Public fetch all hei
    Route::get('fetch/hei','applicantController@fetch_hei');
    //Public fetch all program
    Route::get('fetch/program','applicantController@fetch_program');
