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
Route::get('/master', function () {
    return view('layer.master');
});

Route::get('/master2', function () {
    return view('layer_custom.master');
});

Route::group(['prefix' => 'bac_si'],function(){
	Route::get('view_ngay_lam_viec','BacSiController@view_ngay_lam_viec')->name('view_ngay_lam_viec');
	Route::get('get_calendar_ngay_lam_viec','BacSiController@get_calendar_ngay_lam_viec')->name('get_calendar_ngay_lam_viec');
	Route::post('them_ngay_lam_viec','BacSiController@them_ngay_lam_viec')->name('them_ngay_lam_viec');
	Route::group(['prefix' => 'ajax'],function(){
		Route::get('them/{ngay}','AjaxController@getThemLich');
	});
});