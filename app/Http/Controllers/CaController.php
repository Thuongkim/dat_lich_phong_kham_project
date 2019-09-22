<?php

namespace App\Http\Controllers;

use App\Model\Ca;
use Request;
use Session;


class CaController extends Controller
{
   public function view_all()
   {
      $ca = new Ca();
      $array_ca = $ca->view_all();
      
      // return view('view_ca_lam_viec',compact('array_sinh_vien'));
      return view("ca.view_all",[
         'array' => $array_ca
      ]);
   }
   public function view_insert()
   {
      return view("ca.view_insert");
   }
   public function process_insert()
   {
      $ca                = new Ca();
      $ca->gio_bat_dau = Request::get('gio_bat_dau');
      $ca->gio_ket_thuc = Request::get('gio_ket_thuc');
      $ca->insert();

      //điều hướng
      return redirect()->route('view_ca_lam_viec');
   }
   public function delete($ma_ca)
   {
      $ca               = new Ca();
      $ca->ma_ca = $ma_ca;
      $ca->delete();
      //điều hướng
      return redirect()->route('view_ca_lam_viec');
   }
   public function view_update($ma_ca)
   {
      $ca               = new Ca();
      $ca->ma_ca = $ma_ca;
      $ca               = $ca->get_one();

      return view("ca.view_update",[
         'ca' => $ca,
      ]);
   }
    public function process_update()
   {

      $ca               = new Ca();
      $ca->ma_ca        = Request::get('ma_ca');
      $ca->gio_bat_dau  = Request::get('gio_bat_dau');
      $ca->gio_ket_thuc = Request::get('gio_ket_thuc');
      $ca->update();
      
      

      //điều hướng
      return redirect()->route('view_ca_lam_viec');
   }
}