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

Route::group(['prefix' => 'bac_si','middleware' => 'checkBacSi'],function(){
	Route::get("logout","Controller@logout")
	->name("logout");
	Route::get('view_ngay_lam_viec','BacSiController@view_ngay_lam_viec')->name('view_ngay_lam_viec');
	Route::get('get_calendar_ngay_lam_viec','BacSiController@get_calendar_ngay_lam_viec')->name('get_calendar_ngay_lam_viec');
	Route::post('them_ngay_lam_viec','BacSiController@them_ngay_lam_viec')->name('them_ngay_lam_viec');
	Route::group(['prefix' => 'ajax'],function(){
		Route::get('them/{ngay}','AjaxController@getThemLich');
	});
});
Route::get("/view_login","Controller@view_login")->name("view_login");
Route::post("process_login","Controller@process_login")->name("process_login");

Route::group(['prefix'=>'khach_hang'],function(){
	Route::get('dat_lich','KhachHangController@dat_lich')->name('dat_lich');
});
Route::get("dang_nhap","KhachHangController@dang_nhap")->name("dang_nhap");
Route::get("dang_ki","KhachHangController@dang_ki")->name("dang_ki");
Route::post("process_logup","KhachHangController@process_logup")->name("process_logup");
Route::post("process_login","KhachHangController@process_login_khach_hang")->name("process_login");

Route::get("dang_xuat","KhachHangController@logout")->name("dang_xuat");


