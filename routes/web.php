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
/*
Route::get('/', function () {
    return view('layouts/app');
}); */

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@home')->name('home');

Route::prefix('site')->group(function () {

    Route::get('/termsconditions', 'TermConditionsController@termsconditions')->name('terms-conditions');
    Route::get('/privacypolicy', 'PrivacyPolicyController@privacypolicy')->name('privacy-policy');

});
Route::prefix('blog/new/reader')->group(function () {

    Route::get('/magazine', 'BlogsController@magazinemain')->name('blog-nmagazine');

});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::prefix('administrator')->group(function () {
            Route::get('/', 'AdminController@admin')->name('administrator');
            Route::get('/nmagazine', 'AdminController@adminnmagazine')->name('admin.nmagazine');
            Route::get('/references', 'AdminController@adminreferences')->name('admin.references');

        });
    });
    //api
    Route::post('/getreference', 'ReferencesController@getreference');
    Route::post('/savereference', 'ReferencesController@savereference');
    Route::post('/getallblogs', 'BlogsController@getallblogs');
});

