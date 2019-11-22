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
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/edit-profile', 'ProfileController@editProfile')->name('edit_profile');

Route::post('/update-profile','ProfileController@updateProfile')->name('update_profile');

// Authentication Routes...
Route::get('company-login', 'company\Auth\LoginController@showLoginForm')->name('company_login');
Route::post('company-login', 'company\Auth\LoginController@login');
Route::post('company-logout', 'company\Auth\LoginController@logout')->name('company_logout');

// Registration Routes...

Route::get('company-register', 'company\Auth\RegisterController@showRegistrationForm')->name('company_register');
Route::post('company-register', 'company\Auth\RegisterController@register');

Route::get('/company-home', 'company\HomeController@index')->name('company_home');

//Job routes are here 
Route::get('/create-job','company\JobController@create_job')->name('create_job');
Route::post('/post-job','company\JobController@post_job')->name('post_job');
Route::get('/view_job/{job_id}','HomeController@view_job')->name('view_job');
Route::post('/apply-job','HomeController@apply_job')->name('apply_job');

Route::get('/view-applicant/{user_id}','company\HomeController@view_applicant')->name('view_applicant');

        

