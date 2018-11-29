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

Auth::routes();

Route::middleware(['web', 'auth'])->group(function() {
    Route::get('/', 'PageController@dashboard')->name('dashboard');

    Route::get('issues/mine', 'IssueController@mine')->name('issues.mine');
    Route::resource('issues', 'IssueController');

});