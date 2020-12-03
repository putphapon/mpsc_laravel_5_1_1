<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

 
//Home
Route::resource('/', 'Home\Title');

//About
Route::resource('/home/about', 'Home\About');
Route::resource('/home/objective', 'Home\AboutObjective');
Route::resource('/home/board', 'Home\AboutBoard');

//Work
Route::resource('/home/work', 'Home\Work');
Route::resource('/home/worksurvey', 'Home\WorkSurvey');
Route::resource('/home/workexchange', 'Home\WorkExchange');
Route::resource('/home/workdev', 'Home\WorkDev');
Route::resource('/home/workcollab', 'Home\WorkCollab');


//Database
Route::resource('/home/database', 'Home\Database');

//Scholar
Route::resource('/home/scholar', 'Home\Scholar');

//Manuscripts
Route::resource('/home/manuscripts', 'Home\Manuscripts');
Route::resource('/home/manuscriptscategory', 'Home\ManuscriptsCategory');
Route::resource('/home/manuscriptsblog', 'Home\ManuscriptsBlog');
Route::resource('/home/manuscriptsblogtag','Home\ManuscriptsBlogTag');


//VDO
Route::resource('/home/vdo', 'Home\VDO');

//Events
Route::resource('/home/events', 'Home\Events');

//Shop
Route::resource('/home/shops', 'Home\Shops');

//Contact
Route::resource('/home/contact', 'Home\Contact');



//Admin
Route::resource('/dashboard', 'Admin\Dashboard');
Route::get('/home', 'Admin\Dashboard@index');

//title
Route::resource('/admin/title', 'Admin\Title');
Route::get('/admin/title','Admin\Title@search');

//about
Route::resource('/admin/about', 'Admin\About');
Route::resource('/admin/AboutObjective', 'Admin\AboutObjective');
Route::get('/admin/AboutObjective','Admin\AboutObjective@search');

Route::resource('/admin/AboutBoard', 'Admin\AboutBoard');
Route::get('/admin/AboutBoard','Admin\AboutBoard@search');

//Database
Route::resource('/admin/database', 'Admin\Database');
Route::get('/admin/database','Admin\Database@search');

//Scholar
Route::resource('/admin/scholar', 'Admin\Scholar');
Route::resource('/admin/scholarcategory', 'Admin\ScholarCategory');
Route::get('/admin/scholarcategory','Admin\ScholarCategory@search');

Route::resource('/admin/scholarblog', 'Admin\ScholarBlog');
Route::get('/admin/scholarblog','Admin\ScholarBlog@search');

//Manuscripts
Route::resource('/admin/manuscripts', 'Admin\Manuscripts');
Route::resource('/admin/manuscriptscategory', 'Admin\ManuscriptsCategory');
Route::get('/admin/manuscriptscategory','Admin\ManuscriptsCategory@search');

Route::resource('/admin/manuscriptsblog', 'Admin\ManuscriptsBlog');
Route::get('/admin/manuscriptsblog','Admin\ManuscriptsBlog@search');


//VDO
Route::resource('/admin/vdo', 'Admin\VDO');
Route::get('/admin/vdo','Admin\VDO@search');

//Events
Route::resource('/admin/events', 'Admin\Events');
Route::get('/admin/events','Admin\Events@search');

//Shop
Route::resource('/admin/shops', 'Admin\Shops');
Route::get('/admin/shops','Admin\Shops@search');

//Contact
Route::resource('/admin/contact', 'Admin\Contact');

