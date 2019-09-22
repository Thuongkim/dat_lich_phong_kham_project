<?php

namespace App\Http\Controllers;

use App\Model\LichHen;
use Request;


class LichHenAdminController extends Controller
{
   public function view_all()
   {
      $lich_hen = new LichHen();
   	$array_lich_hen = $lich_hen->view_all();
      
      // return view('view_all',compact('array_admin'));
      return view("lich_hen.view_all",[
         'array' => $array_lich_hen
      ]);
   }
   public function view_lich_hen_da_duyet()
   {
      $lich_hen = new LichHen();
      $array_lich_hen = $lich_hen->view_lich_hen_da_duyet();
      
      // return view('view_all',compact('array_admin'));
      return view("lich_hen.view_lich_hen_da_duyet",[
         'array' => $array_lich_hen
      ]);
   }
   public function view_lich_hen_da_huy()
   {
      $lich_hen = new LichHen();
      $array_lich_hen = $lich_hen->view_lich_hen_da_huy();
      
      // return view('view_all',compact('array_admin'));
      return view("lich_hen.view_lich_hen_da_huy",[
         'array' => $array_lich_hen
      ]);
   }
   
}