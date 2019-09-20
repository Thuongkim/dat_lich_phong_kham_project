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

Route::get("logout","Controller@logout")->name("logout")->middleware('checkAdminDoctor');

Route::group(['prefix' => 'bac_si','middleware' => 'checkBacSi'],function(){
	Route::get('view_ngay_lam_viec','BacSiController@view_ngay_lam_viec')->name('view_ngay_lam_viec');
	Route::get('get_calendar_ngay_lam_viec','BacSiController@get_calendar_ngay_lam_viec')->name('get_calendar_ngay_lam_viec');
	Route::post('them_ngay_lam_viec','BacSiController@them_ngay_lam_viec')->name('them_ngay_lam_viec');
	Route::group(['prefix' => 'ajax'],function(){
		Route::get('them/{ngay}','AjaxController@getThemLich');
	});
});
Route::get("/view_login","Controller@view_login")->name("view_login");
Route::post("process_login_doctor","Controller@process_login")->name("process_login_doctor");

Route::group(['prefix'=>'khach_hang', 'middleware' => 'checkKhachHang'],function(){
	Route::group(['prefix' => 'ajax'],function(){
		Route::get('getBacSiByDate/{date}','AjaxController@getBacSiByDate');
		Route::get('getBacSiByDateAndCa/{date}/{maCa}','AjaxController@getBacSiByDateAndCa');
		Route::get('getBacSiByCa/{maCa}','AjaxController@getBacSiByCa');
		Route::get('getDateByDoctorId/{maBacSi}','AjaxController@getDateByDoctorId');
		Route::get('getDateByDoctorIdAndCa/{maBacSi}/{maCa}','AjaxController@getDateByDoctorIdAndCa');
		// Route::get('getCaByDoctorId/{maBacSi}','AjaxController@getCaByDoctorId');
		// Route::get('getBacSiByCaId/{maCa}','AjaxController@getBacSiByCaId');
	});
	Route::get('dat_lich','KhachHangController@dat_lich')->name('dat_lich');
	Route::post('lich_hen','LichHenController@create')->name('lich_hen');
	Route::get('view_lich_hen','KhachHangController@view_lich_hen')->name('view_lich_hen');
	Route::get('delete_lich_hen/{ma_khach_hang}/{ngay}/{ma_ca}', ['as' => 'delete_lich_hen', 'uses' => 'LichHenController@delete']);
});
Route::get("dang_nhap","KhachHangController@dang_nhap")->name("dang_nhap");
Route::get("dang_ki","KhachHangController@dang_ki")->name("dang_ki");
Route::post("process_logup","KhachHangController@process_logup")->name("process_logup");
Route::post("process_login","KhachHangController@process_login_khach_hang")->name("process_login");
Route::get("dang_xuat","KhachHangController@logout")->name("dang_xuat");


// Route admin

// Route::get('/', 'Controller@login')->name('login');

// Route::post('process_login', 'Controller@process_login')->name('process_login');

// Route::get('lock_screen', 'Controller@lock_screen')->name('lock_screen');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::get('welcome', 'Controller@welcome')->name('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::get('view_all','AdminController@view_all')
	->name('view_all_admin');

	Route::get('view_insert','AdminController@view_insert')
	->name('admin.view_insert');

	Route::post('process_insert','AdminController@process_insert')
	->name('admin.process_insert');

	Route::get('view_update/{ma_admin}','AdminController@view_update')
	->name('admin.view_update');

	Route::post('process_update','AdminController@process_update')
	->name('admin.process_update');

	Route::get('delete/{ma_admin}','AdminController@delete')
	->name('admin.delete');
});
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::group(['prefix' => 'khach_hang'], function(){
		Route::get('view_all','KhachHangController@view_all')
		->name('view_all_khach_hang');

		Route::get('view_update/{ma_khach_hang}','KhachHangController@view_update')
		->name('khach_hang.view_update');

		Route::post('process_update','KhachHangController@process_update')
		->name('khach_hang.process_update');

		Route::get('delete/{ma_khach_hang}','KhachHangController@delete')
		->name('khach_hang.delete');
	});
});
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::group(['prefix' => 'bac_si'], function(){
		Route::get('view_all','BacSiController@view_all')
		->name('view_all_bac_si');

		// Route::get('view_ngay_lam_viec','BacSiController@view_ngay_lam_viec')
		// ->name('view_ngay_lam_viec');

		// Route::get('get_calendar_ngay_lam_viec','BacSiController@get_calendar_ngay_lam_viec')
		// ->name('get_calendar_ngay_lam_viec');

		Route::get('view_insert','BacSiController@view_insert')
		->name('bac_si.view_insert');

		Route::get('view_update/{ma_bac_si}','BacSiController@view_update')
		->name('bac_si.view_update');

		Route::post('process_insert','BacSiController@process_insert')
		->name('bac_si.process_insert');

		Route::post('process_update','BacSiController@process_update')
		->name('bac_si.process_update');

		Route::get('delete/{ma_bac_si}','BacSiController@delete')
		->name('bac_si.delete');

		// Route::post('them_ngay_lam_viec','BacSiController@them_ngay_lam_viec')->name('them_ngay_lam_viec');
		// Route::group(['prefix' => 'ajax'],function(){
		// 	Route::get('them/{ngay}','AjaxController@getThemLich');
		// });
	});
});
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::group(['prefix' => 'ca'], function(){
		Route::get('view_all','CaController@view_all')
		->name('view_ca_lam_viec');

		Route::get('view_insert','CaController@view_insert')
		->name('ca.view_insert');

		Route::get('process_insert','CaController@process_insert')
		->name('ca.process_insert');

		Route::get('view_update/{ma_ca}','CaController@view_update')
		->name('ca.view_update');

		Route::post('process_update','CaController@process_update')
		->name('ca.process_update');

		Route::get('delete/{ma_ca}','CaController@delete')
		->name('ca.delete');
	});
});
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::group(['prefix' => 'lich_hen'], function(){
		Route::get('view_all','LichHenAdminController@view_all')
		->name('view_all_lich_hen');

		Route::get('view_lich_hen_da_duyet','LichHenAdminController@view_lich_hen_da_duyet')
		->name('view_lich_hen_da_duyet');

		Route::get('view_lich_hen_da_huy','LichHenAdminController@view_lich_hen_da_huy')
		->name('view_lich_hen_da_huy');

	});
});

