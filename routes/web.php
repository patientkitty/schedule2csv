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
Route::get('/input','scheduleController@inputview')->name('input');
Route::post('/add','scheduleController@add')->middleware('reject_if_schedule_exists');
Route::get('/export','scheduleController@export');
Route::get('/exportData/{searchGroup}','scheduleController@exportData');
Route::get('searchGroup','scheduleController@searchGroup');
Route::post('/dateTest','scheduleController@dateTest');
Route::post('/bulkImportSchedule','scheduleController@bulkImportSchedule');

Route::get('/emsTemplate','scheduleController@template');
