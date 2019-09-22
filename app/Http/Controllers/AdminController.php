<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Request;


class AdminController extends Controller
{
   public function view_all()
   {
      $admin = new Admin();
   	$array_admin = $admin->view_all();
      
      // return view('view_all',compact('array_admin'));
      return view("admin.view_all",[
         'array' => $array_admin
      ]);
   }
   public function view_insert()
   {
      return view("admin.view_insert");
   }
   public function process_insert()
   {
      $admin            = new Admin();
      $admin->ten_admin = Request::get('ten_admin');
      $admin->sdt       = Request::get('sdt');
      $admin->email     = Request::get('email');
      $admin->dia_chi   = Request::get('dia_chi');
      $admin->mat_khau  = bcrypt(Request::get('mat_khau'));
      $admin->gioi_tinh = Request::get('gioi_tinh');
      $admin->insert();

      //điều hướng
      return redirect()->route('view_all_admin');
   }
   public function delete($ma_admin)
   {
      $admin               = new Admin();
      $admin->ma_admin = $ma_admin;
      $admin->delete();

      //điều hướng
      return redirect()->route('view_all_admin');
   }
   public function view_update($ma_admin)
   {
      $admin           = new Admin();
      $admin->ma_admin = $ma_admin;
      $admin           = $admin->get_one();

      return view("admin.view_update",[
         'admin' => $admin,
      ]);
   }
   public function process_update()
   {

      $admin            = new Admin();
      $admin->ma_admin  = Request::get('ma_admin');
      $admin->ten_admin = Request::get('ten_admin');
      $admin->sdt       = Request::get('sdt');
      $admin->email     = Request::get('email');
      $admin->dia_chi   = Request::get('dia_chi');
      $admin->mat_khau  = Request::get('mat_khau');
      $admin->gioi_tinh = Request::get('gioi_tinh');
      $admin->update();
      
      

      //điều hướng
      return redirect()->route('view_all_admin');
   }
}