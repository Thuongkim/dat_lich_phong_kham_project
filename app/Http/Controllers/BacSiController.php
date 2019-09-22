<?php

namespace App\Http\Controllers;

use App\Model\BacSi;
use App\Model\NgayLamViec;
use Request;
use Session;
use Exception;

class BacSiController extends Controller
{
  public function view_ngay_lam_viec()
  {
    $ngay_lam_viec = new NgayLamViec();
    $ma_bac_si = Session::get('ma_bac_si');
    $ngay     = $ngay_lam_viec->get_ngay_lam_viec($ma_bac_si);
    $dem_ngay = $ngay[0]->ngay;
    if ($dem_ngay < 5) {
      return view('bac_si.view_ngay_lam_viec')->withErrors(['whateverfieldname'=>'Hãy thêm lịch làm việc của bạn vào tuần tới']);
    }
    return view('bac_si.view_ngay_lam_viec');
  }
  public function get_calendar_ngay_lam_viec()
  {
   $start = Request::get('start');
   $end = Request::get('end');
   $ma_bac_si           = Session::get('ma_bac_si');
   $ngay_lam_viec       = new NgayLamViec();
   $array_ngay_lam_viec = $ngay_lam_viec->get_between_time($start,$end,$ma_bac_si);

   $array = array();
   foreach ($array_ngay_lam_viec as $key => $each) {
    $array[$key]          = array();
    $array[$key]['title'] = $each->gio_ket_thuc;
    $array[$key]['start'] = $each->ngay.'T'.$each->gio_bat_dau;
    $array[$key]['end']   = $each->ngay.'T'.$each->gio_ket_thuc;

  }
  return $array;
}

public function them_ngay_lam_viec()
{
  try {
    $today = date("Y-m-d");
    $day =  Request::post('ngay');
    $k = ($day > $today);
    if ($day > $today) {
      $ngay_lam_viec            = new NgayLamViec();
      $ngay_lam_viec->ma_bac_si = Session::get('ma_bac_si');
      $ngay_lam_viec->ma_ca     = Request::post('ma_ca');
      $ngay_lam_viec->ngay      =  Request::post('ngay');
      $ngay_lam_viec->insert();
    }
    return view('bac_si.view_ngay_lam_viec');
  } catch (Exception $e) {
    return redirect()->route('view_ngay_lam_viec')->withErrors(['whateverfieldname'=>'Thêm lỗi, hoặc trùng, vui lòng kiểm tra lại']);
  }

}

public function view_all()
{
  $bac_si = new BacSi();
  $array_bac_si = $bac_si->view_all();
  return view("bac_si_view.view_all",[
   'array' => $array_bac_si
 ]);
}

public function view_insert()
   {
      return view("bac_si_view.view_insert");
   }
   public function process_insert()
   {
      $bac_si                = new BacSi();
      $bac_si->ten_bac_si = Request::get('ten_bac_si');
      $bac_si->sdt        = Request::get('sdt');
      $bac_si->email        = Request::get('email');
      $bac_si->dia_chi        = Request::get('dia_chi');
      $bac_si->mat_khau        = Request::get('mat_khau');
      $bac_si->gioi_tinh        = Request::get('gioi_tinh');
      $bac_si->insert();

      //điều hướng
      return redirect()->route('view_all_bac_si');
   }
   public function delete($ma_bac_si)
   {
      $bac_si               = new BacSi();
      $bac_si->ma_bac_si = $ma_bac_si;
      $bac_si->delete();
      //điều hướng
      return redirect()->route('view_all_bac_si');
   }

   public function view_update($ma_bac_si)
   {
      $bac_si               = new BacSi();
      $bac_si->ma_bac_si = $ma_bac_si;
      $bac_si               = $bac_si->get_bac_si();

      return view("bac_si_view.view_update",[
         'bac_si' => $bac_si,
      ]);
   }

   public function process_update()
   {

      $bac_si                = new BacSi();
      $bac_si->ma_bac_si = Request::get('ma_bac_si');
      $bac_si->ten_bac_si = Request::get('ten_bac_si');
      $bac_si->sdt          = Request::get('sdt');
      $bac_si->email        = Request::get('email');
      $bac_si->dia_chi        = Request::get('dia_chi');
      $bac_si->mat_khau        = Request::get('mat_khau');
      $bac_si->gioi_tinh        = Request::get('gioi_tinh');
      $bac_si->update();
      
      

      //điều hướng
      return redirect()->route('view_all_bac_si');
   }
}
