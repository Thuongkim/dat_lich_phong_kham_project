<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichHen;
use Session;

class LichHenController extends Controller
{
    public function create(Request $request)
    {
    	$request->validate([
    		'date' => 'required',
    		'ca' => 'required',
    	]);

    	$lich_hen = new LichHen();
    	$lich_hen->ma_khach_hang = Session::get('ma_khach_hang');
    	$lich_hen->ma_bac_si = $request->bac_si;
    	$lich_hen->ngay = $request->date;
    	$lich_hen->ma_ca = $request->ca;
    	$lich_hen->save();

		return view('khach_hang.sign_up')->with('success','Đặt lịch thành công');
    }
}
