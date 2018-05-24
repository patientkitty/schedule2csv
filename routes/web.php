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
Route::get('/weekday','weekdayController@readExcel');
Route::get('/newschedule','scheduleController@newschedule');
Route::get('/test','scheduleController@test');
Route::get('/input','scheduleController@inputview');
