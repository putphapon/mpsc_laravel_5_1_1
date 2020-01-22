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

Route::get('/', function () {
    return view('welcome');
});


// //Home
// Route::resource('/', 'Home\Title');

// //About
// Route::resource('/about', 'Home\About');
// Route::resource('/objective', 'Home\AboutObjective');
// Route::resource('/board', 'Home\AboutBoard');

// //Database
Route::resource('/database', 'Home\Database');

// //Scholar
// Route::resource('/scholar', 'Home\Scholar');

// //Manuscripts
// Route::resource('/manuscripts', 'Home\Manuscripts');
// Route::resource('/manuscriptscategory', 'Home\ManuscriptsCategory');
// Route::resource('/manuscriptsblog', 'Home\ManuscriptsBlog');

// //VDO
// Route::resource('/vdo', 'Home\Vdo');

// //Events
// Route::resource('/events', 'Home\Events');

// //Shop
// Route::resource('/shops', 'Home\Shops');

// //Contact
// Route::resource('/contact', 'Home\Contact');



// //Admin
// //title
// Route::resource('/admin/title', 'Admin\Title');

// //about
// Route::resource('/admin/about', 'Admin\About');

// //Database
Route::resource('/admin/database', 'Admin\Database');

// //Scholar
// Route::resource('/admin/scholar', 'Admin\Scholar');
// Route::resource('/admin/scholarcategory', 'Admin\ScholarCategory');
// Route::resource('/admin/scholarblog', 'Admin\ScholarBlog');

// //Manuscripts
// Route::resource('/admin/manuscripts', 'Admin\Manuscripts');
// Route::resource('/admin/manuscriptscategory', 'Admin\ManuscriptsCategory');
// Route::resource('/admin/manuscriptsblog', 'Admin\ManuscriptsBlog');

// //VDO
// Route::resource('/admin/vdo', 'Admin\VDO');

// //Events
// Route::resource('/admin/events', 'Admin\Events');

// //Shop
// Route::resource('/admin/shops', 'Admin\Shops');

// //Contact
// Route::resource('/admin/contact', 'Admin\Contact');

