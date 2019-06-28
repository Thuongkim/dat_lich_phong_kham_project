<?php

namespace App\Http\Controllers;



class KhachHangController extends Controller
{
	function dat_lich(){
		return view('khach_hang.sign_up');
	}

	function dang_nhap(){
		return view('khach_hang.log_in');
	}

	function dang_ki(){
		return view('khach_hang.log_up');
	}
}