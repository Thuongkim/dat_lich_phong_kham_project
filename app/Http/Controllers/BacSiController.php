<?php

namespace App\Http\Controllers;

use App\Model\NgayLamViec;
use Request;
use Session;

class BacSiController extends Controller
{
    public function view_ngay_lam_viec()
    {
    	return view('bac_si.view_ngay_lam_viec');
    }
    public function get_calendar_ngay_lam_viec()
    {
    	$start = Request::get('start');
    	$end = Request::get('end');
    	 // $ma_bac_si = Session::get('ma_bac_si');
      	$ma_bac_si = 1;
      	$ngay_lam_viec = new NgayLamViec();
      	$array_ngay_lam_viec = $ngay_lam_viec->get_between_time($start,$end,$ma_bac_si);

      	$array = array();
      	foreach ($array_ngay_lam_viec as $key => $each) {
      		$array[$key] = array();
      		$array[$key]['title'] = $each->gio_ket_thuc;
      		$array[$key]['start'] = $each->ngay.'T'.$each->gio_bat_dau;
      		$array[$key]['end'] = $each->ngay.'T'.$each->gio_ket_thuc;

      	}
      	return $array;
    }

    public function them_ngay_lam_viec()
    {
        $ngay_lam_viec = new NgayLamViec();
        $ngay_lam_viec->ma_bac_si = 1;
        $ngay_lam_viec->ma_ca = Request::post('ma_ca');
        $ngay_lam_viec->ngay =  Request::post('ngay');
        $ngay_lam_viec->insert();

        return view('bac_si.view_ngay_lam_viec');
    }
}
